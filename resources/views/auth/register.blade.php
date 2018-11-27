@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Registrarme" class="my-3">
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

                <b-form method="POST" action="{{ route('register') }}">
                    @csrf
                    <b-form-group
                                label="{{ __('Nombre:') }}"
                                label-for="name">
                        <b-form-input type="text"
                                    id="name" name="name"
                                    value="{{ old('name') }}" required autofocus
                                    placeholder="Nombre">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                                label="{{ __('Correo Electrónico:') }}"
                                label-for="email"
                                description="Nunca compartiremos tu correo, estás seguro con nosotros.">
                        <b-form-input type="email"
                                    id="email" name="email"
                                    value="{{ old('email') }}" required
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

                    <b-form-group
                                label="{{ __('Confirmar Contraseña:') }}"
                                label-for="password_confirmation">
                        <b-form-input type="password"
                                    id="password_confirmation" name="password_confirmation"
                                    placeholder="*********" required>
                        </b-form-input>
                    </b-form-group>

                    <b-button type="submit" variant="primary">
                        {{ __('Confirmar registro') }}
                    </b-button>

                    <b-button href="{{ route('login') }}" variant="link">
                        {{ __('Ya te has registrado?') }}
                    </b-button>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
