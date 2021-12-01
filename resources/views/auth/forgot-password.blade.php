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
<h4 class="">Forgot Password</h4>

@if (session('status'))
	<div class="mb-4 font-medium text-sm text-success">
		{{ session('status') }}
	</div>
@endif

<form method="POST" action="{{ route('password.email') }}"
class="register-form outer-top-xs" role="form" >
    @csrf
    <div class="form-group">
        <label class="info-title" for="email">Email Address <span>*</span></label>
        <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
    </div>

    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection