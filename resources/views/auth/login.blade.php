<x-guest-layout>

    <div id="auth-left">
        <div class="auth-logo">
            <a href="/"><img src="{{ asset('/images/logo/logo.png') }}" alt="Логотип"></a>
        </div>
        <h1 class="auth-title">Вход в систему</h1>
        <p class="auth-subtitle mb-5">Войдите с помощью данных, которые вы указали при регистрации.</p>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input class="form-control form-control-xl" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Пароль">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                    Запомнить меня
                </label>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Войти</button>
        </form>

        <div class="text-center mt-5 text-lg fs-4">
            @if (Route::has('register'))
            <p class="text-gray-600">Нет аккаунта? <a href="{{route('register')}}" class="font-bold">Зарегистрироваться</a>.</p>
            @endif

            @if (Route::has('password.request'))
            <p><a class="font-bold" href="{{route('password.request')}}">Забыли пароль?</a></p>
            @endif
        </div>
    </div>
</x-guest-layout>
