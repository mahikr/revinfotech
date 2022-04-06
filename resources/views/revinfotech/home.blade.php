@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline">Company</a>
                        <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline">Employee</a>
                    
                </div>
    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
