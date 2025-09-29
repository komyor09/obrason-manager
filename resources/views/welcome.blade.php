<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @php
        // Фейковые товары
        $products = collect([
            (object) [
                'id' => 1,
                'name' => 'Вода 20 литровая',
                'price' => 5.5,
                'stock' => 10,
                'status' => 'В наличии',
                'image' => '/images/samples/water-20l.png',
            ],
            (object) [
                'id' => 2,
                'name' => 'Вода 1.5 литра',
                'price' => 1.2,
                'stock' => 50,
                'status' => 'В наличии',
                'image' => '/images/samples/water-1_5l.png',
            ],
            (object) [
                'id' => 3,
                'name' => 'Вода 0.5 литра',
                'price' => 0.8,
                'stock' => 100,
                'status' => 'Ожидается',
                'image' => '/images/samples/water-0_5l.png',
            ],
        ]);
    @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ObRason — Доставка воды</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .hero {
            background: url('/images/water-hero.jpg') center/cover no-repeat;
            height: 80vh;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 3rem;
            border-radius: 0.5rem;
        }

        .services img {
            width: 100px;
        }

        .btn-primary {
            background-color: #EF3B2D;
            border: none;
        }

        .btn-primary:hover {
            background-color: #d32b20;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">ObRason</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Войти</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex justify-content-center align-items-center text-center">
        <div class="hero-overlay">
            <h1 class="display-4 fw-bold">Свежая вода прямо к вашему дому</h1>
            <p class="lead">ObRason доставляет чистую воду быстро и удобно. Заказывайте онлайн и наслаждайтесь
                качеством.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Попробовать сейчас</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services py-5 bg-light text-center">
        <div class="container">
            <h2 class="mb-4 fw-bold">Наши услуги</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="/images/water-bottle.png" alt="Вода" class="mb-3">
                    <h5>Доставка воды</h5>
                    <p>Быстрая и удобная доставка воды 19л и 20л прямо к вашей двери.</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/delivery-truck.png" alt="Курьер" class="mb-3">
                    <h5>Сервис курьера</h5>
                    <p>Наши курьеры профессионально доставят ваш заказ в любое время.</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/payment.png" alt="Оплата" class="mb-3">
                    <h5>Удобная оплата</h5>
                    <p>Оплата онлайн или при получении — выбирайте то, что удобно вам.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-5">
        <div class="container text-center">
            <h2 class="mb-4 fw-bold">Наши виды воды</h2>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Цена: ${{ number_format($product->price, 2) }}</p>
                                <p class="card-text">Наличие: {{ $product->status }}</p>
                                <a href="{{ route('product.show', $product->id) }}"
                                    class="btn btn-primary">Заказать</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <p class="mb-0">&copy; {{ date('Y') }} ObRason. Все права защищены.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
