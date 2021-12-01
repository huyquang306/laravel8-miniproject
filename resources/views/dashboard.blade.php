@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img src="{{ (!empty(Auth::user()->profile_photo_path)) ? url(Auth::user()->profile_photo_path) : url('upload/no_image.jpg') }}" 
                    class="card-img-top" style="border-radius: 50%" height="100%" width="100%"> <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-small btn-block"> Home </a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-small btn-block"> Profile Update </a>
                        <a href="{{route('user.change.password')}}" class="btn btn-primary btn-small btn-block"> Change Password </a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-small btn-block"> Logout </a>
                    </ul>
                </div>

                <div class="col-md-2">
                    
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-primary">
                            Welcome <strong>{{ Auth::user()->name }}</strong>    
                        </span></h3>
                    </div>
                </div>

                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </div>
@endsection