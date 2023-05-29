<x-guest-layout>
    @section('title', $viewName)
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="prova">
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NomeUtente -->
            <div>
                <x-input-label for="NomeUtente" :value="__('Nomeutente')" />

                <x-text-input id="NomeUtente" class="block mt-1 w-full" type="text" name="NomeUtente" :value="old('NomeUtente')" required autofocus />

                <x-input-error :messages="$errors->get('NomeUtente')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="Password" :value="__('Password')" />

                <x-text-input id="Password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
             
           <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Conferma password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <!-- Nome -->
            <div class="mt-4">
                <x-input-label for="Nome" :value="__('Nome')" />

                <x-text-input id="Nome" class="block mt-1 w-full" type="text" name="Nome" :value="old('Nome')" required />

                <x-input-error :messages="$errors->get('Nome')" class="mt-2" />
            </div>

            <!-- Cognome -->
            <div class="mt-4">
                <x-input-label for="Cognome" :value="__('Cognome')" />

                <x-text-input id="Cognome" class="block mt-1 w-full" type="text" name="Cognome" :value="old('Cognome')" required />

                <x-input-error :messages="$errors->get('Cognome')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="Email" :value="__('Email')" />

                <x-text-input id="Email" class="block mt-1 w-full" type="email" name="Email" :value="old('Email')" required />

                <x-input-error :messages="$errors->get('Email')" class="mt-2" />
            </div>

            <!-- Telefono -->
            <div class="mt-4">
                <x-input-label for="Telefono" :value="__('Telefono')" />

                <x-text-input id="Telefono" class="block mt-1 w-full" type="text" name="Telefono" :value="old('Telefono')" required />

                <x-input-error :messages="$errors->get('Telefono')" class="mt-2" />
            </div>

            <!-- Genere -->
            <div class="mt-4">
                <x-input-label for="Genere" :value="__('Genere')" />

                <select id="Genere" name="Genere" class="block mt-1 w-full" required>
                    <option value="Maschio">Maschio</option>
                    <option value="Femmina">Femmina</option>
                    <option value="Altro">Altro</option>
                </select>

                <x-input-error :messages="$errors->get('Genere')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Già registrato?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrati') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
