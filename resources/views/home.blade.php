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
                </div>
                {{-- @include('layouts.flash') --}}
                <x-alert>
                    <p>Here is response!</p>
                </x-alert>
                <div class="card-body">
                    <form action="/upload_avatar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
