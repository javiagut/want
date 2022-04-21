@extends('layouts.app')

@section('content')
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <h3 class="inicioSesionTitulo">Registrarse</h3>
        <form method="POST" action="{{ route('register') }}" id="formLogin" class="formRegister">
            @csrf
            <table>
                <tr>
                    <td><label for="name">{{ __('Nombre') }}</label></td>
                    <td><input id="name" type="text" class="form-control @error('Nombre') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus></td>
                    @error('Nombre')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="apellido1">{{ __('Primer Apellido') }}</label></td>
                    <td><input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" required autocomplete="apellido1"></td>
                    @error('apellido1')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="apellido2">{{ __('Segundo Apellido') }}</label></td>
                    <td><input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" autocomplete="apellido2"></td>
                    @error('apellido2')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="contacto1">{{ __('Contacto') }}</label></td>
                    <td><input id="contacto1" type="text" class="form-control @error('contacto1') is-invalid @enderror" name="contacto1" required autocomplete="contacto1"></td>
                    @error('contacto1')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="contacto2">{{ __('Contacto (Secundario)') }}</label></td>
                    <td><input id="contacto2" type="text" class="form-control @error('contacto2') is-invalid @enderror" name="contacto2" autocomplete="contacto2"></td>
                    @error('contacto2')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="nacimiento">{{ __('Nacimiento') }}</label></td>
                    <td><input id="nacimiento" type="date" class="form-control @error('nacimiento') is-invalid @enderror" name="nacimiento" required autocomplete="nacimiento"></td>
                    @error('nacimiento')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="email">{{ __('Correo electrónico') }}</label></td>
                    <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"></td>
                    @error('email')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="password">{{ __('Password') }}</label></td>
                    <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"></td>
                    @error('password')
                        <td>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="password-confirm">{{ __('Confirmar Password') }}</label></td>
                    <td><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrarse') }}
                        </button>
                    </td>
                </tr>
                <tr><td></td>
                    <td>
                        <a href="{{ route('login') }}">
                            Ya tengo cuenta
                        </a>
                    </td>
                </tr>
            </table>
        </form>

@endsection
