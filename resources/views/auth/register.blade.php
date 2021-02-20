@extends('auth.auth_template')

@section('title')
Sign up
@endsection

@section('main')


<div class="wrap-login100">
    <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
        <img class="login-apotech" src="{{url('/')}}/template/assets/images/login/apotech2.png" />
        @csrf
        <span class="login100-form-title p-b-43">
            <h2 class="apotech-masuk"> <b> Register</b> </h2>
        </span>


        <div class="wrap-input100 validate-input">

            <input class="input100" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                name="nama" value="{{ old('nama') }}" placeholder="Nama">
            @error('nama')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input">
            <input class="input100" id="username" type="text"
                class="form-control @error('username') is-invalid @enderror" name="username"
                value="{{ old('username') }}" placeholder="Username">
            @error('username')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <select type="text" id="tipe_user" class="form-control @error('tipe_user') is-invalid @enderror"
                name="tipe_user" value="{{ old('tipe_user') }}">
                <option value="admin">Admin</option>
                <option value="apoteker">Apoteker</option>
            </select>
            @error('tipe_user')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">
            @error('email')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input">
            <input class="input100" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
            <span class="focus-input100">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
            {{ __('Register') }}
            </button>
        </div>
    </form>

    <div class="login100-more" style="background-image: url('template_login/images/login.png');">
    </div>

</div>
<div class="col-lg-12 col-md-7 bg-white">
    <div class="p-3">
        <div class="text-center">
            <img src="{{asset('template/assets/images/login/apotech.png')}}" alt="wrapkit">
        </div>
        <h2 class="mt-3 text-center">Sign Up</h2>
        <form class="mt-4" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="nama">{{ __('Nama') }}</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="username">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="tipe_user">{{ __('Tipe User') }}</label>
                        <select type="text" id="tipe_user" class="form-control @error('tipe_user') is-invalid @enderror"
                            name="tipe_user" value="{{ old('tipe_user') }}" required autocomplete="tipe_user" autofocus>
                            <option value="admin">Admin</option>
                            <option value="apoteker">Apoteker</option>
                        </select>
                        <!-- <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus> -->

                        @error('tipe_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="password">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="text-dark" for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-block btn-primary">{{ __('Register') }}</button>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    Already have an account? <a href="{{ route('login') }}" class="text-danger">Sign
                        In</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
