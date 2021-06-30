@extends('frontend.layout.index')

@section('content')
<div class="ft-preloader active">
    <div class="ft-preloader-inner h-100 d-flex align-items-center justify-content-center">
        <div class="ft-child ft-bounce1"></div>
        <div class="ft-child ft-bounce2"></div>
        <div class="ft-child ft-bounce3"></div>
    </div>
</div>

<!-- Breadcrumb area Start -->
<section class="page-title-area bg-color" data-bg-color="#FFFFFF" style=>
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Desafío Lesaffre 2021</h1>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<div class="main-content-wrapper">
    <div class="page-content-inner pt--25 pb--80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-sm--50">
                    <div class="login-box">
                        <h3 class="heading__tertiary mb--30">Iniciar Sesión</h3>
                        <form method="POST" action="{{ route('login') }}" class="form form--login">
                            @csrf
                            <div class="form__group mb--20">
                                <label class="form__label" for="username_email">Email <span class="required">*</span></label>
                                <input type="email" class="form__input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form__group mb--20">
                               <label class="form__label" for="login_password">Contraseña <span class="required">*</span></label>
                                <input type="password" class="form__input @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center mb--20">
                                <div class="form__group mr--30">
                                    <input type="submit" value="Iniciar Sesión" class="btn btn-size-sm">
                                </div>
                            </div>
                            {{-- <a class="forgot-pass" href="#">Lost your password?</a> --}}
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
               		<registro></registro>
               	</div>
            </div>
        </div>
    </div>
</div>

@endsection