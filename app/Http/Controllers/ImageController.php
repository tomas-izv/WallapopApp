<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($id)
    {
        $image = Image::findOrFail($id);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return back()->with('success', 'Imagen eliminada exitosamente.');
    }
}