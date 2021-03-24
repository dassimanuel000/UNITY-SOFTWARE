@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="page-header-image" style="background-image:url({{asset('images/login.jpg')}})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="https://thememakker.com/templates/oreo/html/assets/images/logo.svg" alt="">
                            </div>
                            <h5>Log in</h5>
                        </div>
                        <div class="content">
                            <div class="input-group input-lg">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter User Name" required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                                </span>
                            </div>

                            <div class="input-group input-lg">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <a href="" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</a>
                            <h5><a href="#" class="link">Forgot Password?</a></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="" target="_blank">Contact Us</a></li>
                        <li><a href="" target="_blank">About Us</a></li>
                        <li><a href="javascript:void(0);">FAQ</a></li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    <span>Designed by <a href="" target="_blank">-</a></span>
                </div>
            </div>
        </footer>
    </div>
@endsection
