@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Iniciar Sesión" class="my-3">
                @if ($errors->any())
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @else
                    <b-alert show>
                        Por favor ingresa tus credenciales
                    </b-alert>
                @endif

                <b-form method="POST" action="{{ route('login') }}">
                    @csrf
                    <b-form-group
                                label="{{ __('Correo Electrónico:') }}"
                                label-for="email">
                        <b-form-input type="email"
                                    id="email" name="email"
                                    value="{{ old('email') }}" required autofocus
                                    placeholder="example.email@email.com">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                                label="{{ __('Contraseña:') }}"
                                label-for="password">
                        <b-form-input type="password"
                                    id="password" name="password"
                                    placeholder="*********" required>
                        </b-form-input>
                    </b-form-group>

                    <b-form-group>
                        <b-form-checkbox name="remember" {{ old('remember') ? 'checked="true"' : '' }}>
                            {{ __('Recuérdame') }}
                        </b-form-checkbox>
                    </b-form-group>

                    <b-button type="submit" variant="primary">
                        {{ __('Ingresar') }}
                    </b-button>

                    <b-button href="{{ route('password.request') }}" variant="link">
                        {{ __('Olvidaste tu contraseña?') }}
                    </b-button>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
