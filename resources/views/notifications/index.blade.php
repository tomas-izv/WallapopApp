@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h3 class="text-center mb-0">Notifications</h3>
                    </div>
                    <div class="card-body">
                        @if(auth()->user()->notifications->isEmpty())
                            <div class="alert alert-info text-center">You don't have any notifications.</div>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach(auth()->user()->notifications as $notification)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $notification->data['message'] }}
                                            <small
                                                class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Mark as read</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection