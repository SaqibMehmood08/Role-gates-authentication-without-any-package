@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @role('editor')
                <div class="card-header">{{ __('Editor Dashboard') }}</div>
                @endrole

                {{-- @if(auth()->user()->hasRole('editor'))
                <div class="card-header">{{ __('Editor Dahboard') }}</div>
            @else
                <div class="card-header">{{ __('Regular User Dashboard') }}</div>
            @endif --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
