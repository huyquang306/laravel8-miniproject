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
                            Change Password  
                        </span></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.update.password')}}" method="POST" class="register-form outer-top-xs">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="current_password"> Current Password </label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="current_password">
                                </div>
                                @error('current_password')
                                    <span class="text-danger" style="color: red"> {{ $message }} </span>
                                @enderror

                                <div class="form-group">
                                    <label class="info-title" for="password"> New Password </label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="password">
                                </div>
                                @error('password')
                                    <span class="text-danger" style="color: red"> {{ $message }} </span>
                                @enderror

                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation"> Password Confirmation </label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation">
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger" style="color: red"> {{ $message }} </span>
                                @enderror
                                

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