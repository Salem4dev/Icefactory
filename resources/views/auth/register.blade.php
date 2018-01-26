

{{--@extends('layouts.head')--}}

{{--@section('login')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                           {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}
 {{----}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}




{{--<!-- <div class="container-fluid login">--}}
	{{--<div class="container">--}}
    	{{--<div class="row main">--}}
			{{--<div class="col-md-6 col-md-offset-3">--}}
				{{--<div class="panel panel-login">--}}
					{{--<div class="panel-heading">--}}
						{{--<div class="row">--}}
							{{--<div class="col-xs-6">--}}
								{{--<a href="" class="active" id="login-form-link">Login</a>--}}
							{{--</div>--}}
							{{--<div class="col-xs-6">--}}
								{{--<a href="" id="register-form-link">Register</a>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<hr>--}}
					{{--</div>--}}
					{{--<div class="panel-body">--}}
						{{--<div class="row">--}}
							{{--<div class="col-lg-12">	--}}
                            {{--<!-- start register form -->--}}
								{{--<!-- <form id="register-form" class="form-horizontal" action="{{ route('login') }}" method="POST" role="form" style="display: block;">--}}
									{{--{{ csrf_field() }}--}}
									{{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                     {{--<label for="name" class="col-md-4 control-label">Name</label>--}}
										{{--<input name="name" id="username" tabindex="1" class="form-control" placeholder="Username" type="text" value="{{ old('name') }}" required autofocus>--}}
										 {{--@if ($errors->has('name'))--}}
											{{--<span class="help-block">--}}
												{{--<strong>{{ $errors->first('name') }}</strong>--}}
											{{--</span>--}}
										{{--@endif--}}
									{{--</div>--}}
									{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}
										{{--<input name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" type="email" value="{{ old('email') }}" required>--}}
											{{--@if ($errors->has('email'))--}}
												{{--<span class="help-block">--}}
													{{--<strong>{{ $errors->first('email') }}</strong>--}}
												{{--</span>--}}
											{{--@endif--}}
									{{--</div>--}}
									{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}
										{{--<input name="password" id="password" tabindex="2" class="form-control" placeholder="Password" type="password" 		required="required">--}}
											{{--@if ($errors->has('password'))--}}
												{{--<span class="help-block">--}}
													{{--<strong>{{ $errors->first('password') }}</strong>--}}
												{{--</span>--}}
											{{--@endif--}}
									{{--</div>--}}
									{{--<div class="form-group">--}}
                                     {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}
										{{--<input name="password_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" type="password" required="required">--}}
									{{--</div>--}}
									{{--<div class="form-group">--}}
										{{--<div class="row">--}}
											{{--<div class="col-sm-6 col-sm-offset-3">--}}
												{{--<button id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now" type="submit">Register Now </button>--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</form> -->--}}
							{{----}}
								{{--<!-- end register form -->	--}}

                                {{--<!-- start login form -->--}}
								{{--<!-- <form  id="login-form" role="form" style="display: none;" method="POST" action="{{ route('login') }}">--}}
								{{--{{ csrf_field() }}--}}
									{{----}}
									{{--<div class="form-group">--}}
										{{--<input id="username" type="email" tabindex="1" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>--}}
                                        {{--@if ($errors->has('email'))--}}
                                            {{--<span class="help-block">--}}
                                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
									 {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                            {{--<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="required" />--}}
                                            {{--@if ($errors->has('password'))--}}
                                                {{--<span class="help-block alert">--}}
                                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                                {{--</span>--}}
                                            {{--@endif--}}
                                    {{--</div>--}}
									{{--<div class="form-group text-center">--}}
                                        {{--<input type="checkbox" tabindex="3"  id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
										{{--<label for="remember"> Remember Me</label>--}}
									{{--</div>--}}
									{{--<div class="form-group">--}}
										{{--<div class="row">--}}
											{{--<div class="col-sm-6 col-sm-offset-3">--}}
												{{--<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{--<div class="form-group">--}}
										{{--<div class="row">--}}
											{{--<div class="col-lg-12">--}}
												{{--<div class="text-center">--}}
													{{--<a tabindex="5" class="forgot-password" href="{{ route('password.request') }}">Forgot Password?</a>--}}
												{{--</div>--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</form> -->--}}
								{{--<!-- end login form -->--}}
								{{----}}
														{{----}}
						{{--<!-- 	</div>--}}
						{{--</div>--}}
							{{----}}
					{{--</div>--}}
					{{----}}
				{{--</div>--}}
				{{----}}
			{{--</div>--}}
			{{----}}
		{{--</div>--}}
		{{----}}
	{{--</div>--}}
{{--</div> --> --}}



{{--<!-- <div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form id="register-form" action="{{ route('login') }}" method="POST" style="display: block;">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<input name="name" id="name" tabindex="1" class="form-control" placeholder="Username" type="text"       value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="Email Address" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Password" 	required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input id="confirm-password" type="password" class="form-control" name="password_confirmation" tabindex="2"  placeholder="Confirm Password"  required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div> -->--}}