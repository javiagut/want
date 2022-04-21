@extends('layouts.app')

@section('content')
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <h3 class="inicioSesionTitulo">Información del usuario</h3>
        @if (session('status'))
            <p id="status">{{session('status')}}</p>
        @endif
        <form method="POST" action="{{ route('actualizarPerfil',Auth::user()) }}" id="formLogin" class="formRegister">
            @csrf
            @method('PATCH')
            <table>
                <tr>
                    <td><label for="name">{{ __('Nombre') }}</label></td>
                    <td><input id="name" type="text" class="form-control @error('Nombre') is-invalid @enderror" name="name" value="{{Auth::user()->nombre}}" required autocomplete="name" autofocus></td>
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
                    <td><input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{Auth::user()->apellido1}}" required autocomplete="apellido1"></td>
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
                    <td><input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{Auth::user()->apellido2}}" autocomplete="apellido2"></td>
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
                    <td><input id="contacto1" type="text" class="form-control @error('contacto1') is-invalid @enderror" name="contacto1" value="{{Auth::user()->contacto1}}" required autocomplete="contacto1"></td>
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
                    <td><input id="contacto2" type="text" class="form-control @error('contacto2') is-invalid @enderror" name="contacto2" value="{{Auth::user()->contacto2}}" autocomplete="contacto2"></td>
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
                    <td><input id="nacimiento" type="date" class="form-control @error('nacimiento') is-invalid @enderror" name="nacimiento"  value="{{Auth::user()->nacimiento}}" required autocomplete="nacimiento"></td>
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
                    <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" readonly></td>
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
                            {{ __('Guardar') }}
                        </button>
                    </td>
                </tr>
            </table>
        </form>

@endsection
