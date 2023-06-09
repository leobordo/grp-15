<x-guest-layout>
    @section('title', 'Accedi')
    <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="./images/home.jpg" style="width: 50px; height: 50px">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

           
            <div>
                <x-input-label for="NomeUtente" :value="__('Nomeutente')" class="bold-label"  />

                <x-text-input id="NomeUtente" class="input_login" type="string" name="NomeUtente" :value="old('NomeUtente')" required autofocus />

                <x-input-error :messages="$errors->get('NomeUtente')"  />
            </div>

            <!-- Password -->
            <div class="">
                <x-input-label for="password" :value="__('Password')" class="bold-label"  />

                <x-text-input id="password" 
                                class="input_login"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" />
            </div>
            <br>
            <div style="text-align: center">
                <x-primary-button class=" Bottone_login"  >
                    {{ __('Log in') }}
                </x-primary-button>
                
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
