<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    function index()
    {
        $admin = Auth::user();
        if ($admin->role == null || $admin->role == 'user') return redirect(url('/'));
        return view('adminLayouts.adminPanel', ['admin' => $admin]);
    }

    function usersView()
    {
        $users = User::where('id', '!=', 1)->get();
        if (Auth::user()->role == null || Auth::user()->role == 'user') return redirect(url('/'));
        return view('adminLayouts.adminUsersLayout.index', ['users' => $users]);
    }


    public function create()
    {
        $enumValues = DB::select("SHOW COLUMNS FROM users WHERE Field = 'role'");
        $typeEnumValues = $enumValues[0]->Type;
        preg_match_all("/'([^']+)'/", $typeEnumValues, $matches);
        $enumValuesArray = $matches[1];
        return view('adminLayouts.adminUsersLayout.create', ['roles' => $enumValuesArray]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            return redirect()->route('allUsers')->with(['message' => 'usuario creado correctamente']);
        } else {
            return back()->withErrors(['message' => $validator->errors()->first()])->withInput();
        }

        dd($request);
    }

    function show(User $user)
    {
        return view('adminLayouts.adminUsersLayout.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $enumValues = DB::select("SHOW COLUMNS FROM users WHERE Field = 'role'");
        $typeEnumValues = $enumValues[0]->Type;
        preg_match_all("/'([^']+)'/", $typeEnumValues, $matches);
        $enumValuesArray = $matches[1];
        return view('adminLayouts.adminUsersLayout.editAdmins', ['user' => $user, 'roles' => $enumValuesArray]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email','max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',

        ]);

        if($validator->passes()){
            $result = $user->update($request->all());
            return redirect()->route('allUsers')->with(['message' => 'The user has been updated properly']);
        }else{
            return back()->withErrors(['message' => $validator->errors()->first()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user -> delete();
        return redirect()->route('allUsers')->with(['message' => 'The user has been deleted properly']);
    }
}
