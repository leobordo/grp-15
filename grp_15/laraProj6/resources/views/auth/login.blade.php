<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="prova">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="NomeUtente" :value="__('Nomeutente')" />

                <x-text-input id="NomeUtente" class="block mt-1 w-full" type="string" name="NomeUtente" :value="old('NomeUtente')" required autofocus />

                <x-input-error :messages="$errors->get('NomeUtente')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <br>
            <div style="text-align: center">
                <x-primary-button class="ml-3" style="margin-left: auto; margin-right: auto  ">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
