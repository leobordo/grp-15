<x-guest-layout>
    @section('title', 'Iscriviti')
    <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="./images/home.jpg" style="width: 50px; height: 50px">
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NomeUtente -->
            <div>
                <x-input-label for="NomeUtente" :value="__('Nomeutente')" class="bold-label" />

                <x-text-input id="NomeUtente" class="input_login" type="text" name="NomeUtente" :value="old('NomeUtente')" required autofocus />

                <x-input-error :messages="$errors->get('NomeUtente')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="Password" :value="__('Password')" class="bold-label" />

                <x-text-input id="Password" class="input_login"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
             
           <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Conferma password')" class="bold-label"  />

                <x-text-input id="password_confirmation" class="input_login"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <!-- Nome -->
            <div class="mt-4">
                <x-input-label for="Nome" :value="__('Nome')" class="bold-label" />

                <x-text-input id="Nome" class="input_login" type="text" name="Nome" :value="old('Nome')" required />

                <x-input-error :messages="$errors->get('Nome')" class="input_login" />
            </div>

            <!-- Cognome -->
            <div class="mt-4">
                <x-input-label for="Cognome" :value="__('Cognome')" class="bold-label" />

                <x-text-input id="Cognome" class="input_login" type="text" name="Cognome" :value="old('Cognome')" required />

                <x-input-error :messages="$errors->get('Cognome')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="Email" :value="__('Email')" class="bold-label" />

                <x-text-input id="Email" class="input_login" type="email" name="Email" :value="old('Email')" required />

                <x-input-error :messages="$errors->get('Email')" class="mt-2" />
            </div>

            <!-- Telefono -->
            <div class="mt-4">
                <x-input-label for="Telefono" :value="__('Telefono')" class="bold-label"  />

                <x-text-input id="Telefono" class="input_login" type="text" name="Telefono" :value="old('Telefono')" required />

                <x-input-error :messages="$errors->get('Telefono')" class="mt-2" />
            </div>

            <!-- Genere -->
            <div class="mt-4">
                <x-input-label for="Genere" :value="__('Genere')" class="bold-label"  />

                <select id="Genere" name="Genere" class="input_login" required>
                    <option value="Maschio">Maschio</option>
                    <option value="Femmina">Femmina</option>
                    <option value="Altro">Altro</option>
                </select>

                <x-input-error :messages="$errors->get('Genere')" class="mt-2" />
                    <div class="registrato">
                        <x-primary-button class="Bottone_Registrati">
                            {{ __('Registrati') }}
                        </x-primary-button>
                        <a class="registrato-link" href="{{ route('login') }}">
                            {{ __('Già registrato?') }}
                        </a>
                    </div>
        </form>
    </x-auth-card>
</x-guest-layout>