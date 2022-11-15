<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="content">
                <img style="position:relative; top:50%; left:50%; transform:translate(-50%, -15%);" src="/photo/Provinsi_Aceh_Logo.png" alt="logo" class="img-fluid" width="155" height="193"/>
                <h1 class="col-xs-8 text-center">Konservasi Energi Pemerintah Aceh</h1>
            </div> 
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
