<x-guest-layout>
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="{{ asset('/images/logo/logo.png') }}" alt="Логотип"></a>
        </div>
        <h1 class="auth-title">Забыли пароль</h1>
        <p class="auth-subtitle mb-5">Введите ваш email, и мы отправим ссылку для сброса пароля.</p>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}" name="email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Отправить ссылку для сброса пароля</button>
        </form>

        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Помните ваш аккаунт? <a href="{{ route('login')}}" class="font-bold">Войти</a>.</p>
        </div>
    </div>
</x-guest-layout>
