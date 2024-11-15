@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <div>User List</div>

                    @forelse ($users as $user)
                        <div>{{ $user->name }}</div>
                        @php
                            $redirectUrl = '/dashboard';
                            $token = tenancy()->impersonate(tenant(), $user->id, $redirectUrl);
                        @endphp
                        <div><a href="{{ route('impersonate', $token) }}">Impersonate</a></div>
                    @empty
                        Not found.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
