@extends('layouts.app')
@section('content')
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <h3 class="inicioSesionTitulo">Iniciar Sesión</h3>
    @if (session('status'))
        <p id="status">{{session('status')}}</p>
    @endif
    <form method="POST" action="{{ route('login') }}" id="formLogin">
        @csrf

        <table>
            <div>
                <tr>
                    <td><label for="email">Usuario</label></td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <input id="email" type="email"rol @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" >
            
                    </td>
                    @error('email')
                        <td>
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                    </div>
                </tr>
            </div>

            <div>
                <tr>
                    <td><label for="password">Contraseña</label></td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <input id="password" type="password"rol @error('password') is-invalid @enderror name="password" required autocomplete="current-password">
            
                    </td>
                    @error('email')
                        <td>
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </td>
                    @enderror
                    </div>
                </tr>
            </div>

            <div>
                <tr>
                    <td class="checkboxLogin"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Recordarme
                        </label>
                    </td>
                </tr>
            </div>

            <div>
                <tr>
                    <div>
                        <td>
                            <button type="submit">
                                {{ __('Login') }}
                            </button>
                            
                        </td>
                    </div>
                </tr>
                @if (Route::has('password.request'))
                    <tr>
                        <td>
                            <a href="{{ route('password.request') }}">
                                He olvidado mi contraseña
                            </a>
                        </td>
                    </tr>    
                @endif
            </div>
            <tr>
                <td>
                    <a href="{{ route('register') }}">
                        Registrarse
                    </a>
                </td>
            </tr> 

        </table>

        
    </form>
@endsection
