<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Спасибо за регистрацию! Прежде чем начать, пожалуйста, подтвердите свой адрес электронной почты, перейдя по ссылке, которую мы только что отправили вам на почту. Если вы не получили письмо, мы с радостью отправим его снова.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Новая ссылка для подтверждения адреса электронной почты была отправлена на указанный вами при регистрации адрес.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Отправить письмо повторно') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Выйти') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
