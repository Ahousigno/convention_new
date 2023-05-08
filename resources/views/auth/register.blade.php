{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}


<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f093fb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom right, rgb(18, 166, 80), #d63384);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom right, rgb(18, 166, 80), #d63384)
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>


</head>

<body class="bg-form" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <section class="vh-100 gradient-custom">
        <div class="container py-3">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Créer un compte</h3>
                            {!! Form::open(array('route' => 'users.store_guest', 'method' => 'post')) !!}
                            <input type="hidden" name="service" value="Aucun">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        {!! Form::label('name', 'Nom') !!}<sup class="text-danger fw-bold">*</sup>
                                        {!! Form::text('name', old('name'), array('class' => 'form-control border
                                        border-dark')) !!}
                                        @if ($errors->has('name'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        {!! Form::label('pname', 'Prénoms:') !!}<sup class="text-danger fw-bold">*</sup>
                                        {!! Form::text('pname', old('pname'), array('class' => 'form-control border
                                        border-dark')) !!}
                                        @if ($errors->has('pname'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('pname') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        {!! Form::label('email', 'Email') !!}<sup class="text-danger fw-bold">*</sup>
                                        {!! Form::text('email', old('email'), array('class' => 'form-control border
                                        border-dark')) !!}
                                        @if ($errors->has('email'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        {!! Form::label('phone', 'Téléphone') !!}<sup class="text-danger fw-bold">*</sup>
                                        {!! Form::text('phone', old('phone'), array('class' => 'form-control border
                                        border-dark')) !!}
                                        @if ($errors->has('phone'))
                                        <span class="text-danger fst-italic">
                                            {{ $errors->first('phone') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    {!! Form::label('password', 'Mot de Passe') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::password('password', array('class' => 'form-control border border-dark'))
                                    !!}
                                    @if ($errors->has('password'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    {!! Form::label('password-confirm', 'Répetez le mot de passe') !!}<sup class="text-danger font-weight-bold">*</sup>
                                    {!! Form::password('password-confirm', array('class' => 'form-control border
                                    border-dark')) !!}
                                    @if ($errors->has('password-confirm'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('password-confirm') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    {!! Form::label('organisation', 'Organisation') !!}<sup class="text-danger fw-bold">*</sup>
                                    {!! Form::text('organisation', old('organisation'), array('class' => 'form-control
                                    border border-dark')) !!}
                                    @if ($errors->has('organisation'))
                                    <span class="text-danger fst-italic">
                                        {{ $errors->first('organisation') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Créer" />
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>