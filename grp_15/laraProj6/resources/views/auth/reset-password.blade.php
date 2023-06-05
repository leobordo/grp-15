<x-guest-layout>
    @section('title', 'Cambia Password')
    <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="./images/home.jpg" style="width: 50px; height: 50px">
            </a>
        </x-slot>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="mt-4">
                <x-input-label for="vecchia_password" :value="__('Vecchia Password')" class="bold-label" />

                <x-text-input id="vecchia_password" class="input_login" type="password" name="vecchia_password" required />

                <x-input-error :messages="$errors->get('vecchia_password')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Nuova Password')" class="bold-label"/>

                <x-text-input id="password" class="input_login" type="password" name="password" required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Conferma Password')" class="bold-label"/>

                <x-text-input id="password_confirmation" class="input_login"
                                    type="password"
                                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div style="text-align: center">
                <x-primary-button class=" Bottone_login"  >
                    {{ __('Reset Password') }}
                </x-primary-button>
                
            </div>
        </form> 
    </x-auth-card>
</x-guest-layout>