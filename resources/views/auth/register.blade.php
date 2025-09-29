<x-guest-layout>
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="{{ asset('/images/logo/logo.png') }}" alt="Логотип"></a>
        </div>
        <h1 class="auth-title">Регистрация</h1>
        <p class="auth-subtitle mb-5">Введите ваши данные, чтобы зарегистрироваться на нашем сайте.</p>

        <form action="" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" name="name" placeholder="ФИО">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" name="email" placeholder="Email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Пароль">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Подтвердите пароль">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('Я согласен с :terms_of_service и :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Пользовательским соглашением').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Политикой конфиденциальности').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Зарегистрироваться</button>
        </form>

        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Уже есть аккаунт? <a href="{{ route('login') }}" class="font-bold">Войти</a>.</p>
        </div>
    </div>
</x-guest-layout>
