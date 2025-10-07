<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Панель управления 👑</h3>
                <p class="text-subtitle text-muted">Главная панель управления для босса</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Панель управления</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <!-- Заказы сегодня -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="bi bi-bag-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Заказы сегодня</h6>
                                <h6 class="font-extrabold mb-0">152</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Клиенты -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Клиенты</h6>
                                <h6 class="font-extrabold mb-0">1,230</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Доход -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-wallet-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Доход</h6>
                                <h6 class="font-extrabold mb-0">$4,500</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Курьеры онлайн -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="bi bi-truck"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Курьеры онлайн</h6>
                                <h6 class="font-extrabold mb-0">8</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Статистика заказов -->
        <div class="card">
            <div class="card-header">
                <h4>Статистика заказов</h4>
            </div>
            <div class="card-body">
                <div id="chart-orders"></div>
            </div>
        </div>
    </section>

</x-app-layout>
