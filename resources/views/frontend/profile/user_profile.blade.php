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
                        <div class="card-header">
                        <h3 class="text-center"><span class="text-primary">
                            Update Profile  
                        </span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name"> Name </label>
                                    <input type="text" class="form-control unicase-form-control text-input" id="name" name="name"
                                    value="{{$user->name}}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email"> Email Address </label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email"
                                    value="{{$user->email}}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email"> Phone </label>
                                    <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone"
                                    value="{{$user->phone}}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email"> User Image </label>
                                    <input type="file" class="form-control unicase-form-control text-input" id="image" name="profile_photo_path">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> Update </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </div>
@endsection