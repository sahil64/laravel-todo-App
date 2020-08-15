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
                
                <div class="card-body">
                    <!-- @include('layouts.flash')-->
                    <x-alert>
                      <!-- <h4>here, is response of the image upload</h4>--->
                    </ x-alert>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-input" name="image" />
                        <input type="submit" value="upload" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
