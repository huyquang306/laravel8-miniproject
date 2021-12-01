@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Forgot Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page" style="margin-bottom: 10px">
			<div class="row">
                <div class="col-md-6 col-sm-6 sign-in">
<h4 class="">Reset Password</h4>

<form method="POST" action="{{ route('password.update') }}"
class="register-form outer-top-xs" role="form" >
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="form-group">
        <label class="info-title" for="email">Email Address <span>*</span></label>
        <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
    </div>

    <div class="form-group">
        <label class="info-title" for="email">Password <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
    </div>

    <div class="form-group">
        <label class="info-title" for="email">Password Confirmation <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn-upper btn btn-primary checkout-page-button"> Reset Password </button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection