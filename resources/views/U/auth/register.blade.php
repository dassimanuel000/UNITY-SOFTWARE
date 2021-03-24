@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="page-header-image" style="background-image:url({{asset('images/login.jpg')}})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="https://thememakker.com/templates/oreo/html/assets/images/logo.svg" alt="">
                            </div>
                            <h5>Sign Up</h5>
                            <span>Register a new membership</span>
                        </div>
                        <div class="content">
                            <div class="input-group">
                               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Entrez votre nom" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                                </span>
                            </div>

                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                                </span>
                            </div>

                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>

                            <div class="input-group">
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe" required autocomplete="new-password">
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light">SIGN UP</button>
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
