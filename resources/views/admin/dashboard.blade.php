<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Панель Гиперадмина 👑</h3>
                <p class="text-subtitle text-muted">Полный контроль над платформой: пользователи, бизнесы, заказы, отчёты, настройки</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Панель гиперадмина</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <!-- Все заказы -->
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
                                <h6 class="text-muted font-semibold">Все заказы</h6>
                                <h6 class="font-extrabold mb-0">{{ $ordersCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Пользователи -->
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
                                <h6 class="text-muted font-semibold">Пользователи</h6>
                                <h6 class="font-extrabold mb-0">{{ $usersCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Бизнесы / Компании -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Бизнесы</h6>
                                <h6 class="font-extrabold mb-0">{{ $companiesCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Модераторы -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="bi bi-shield-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Модераторы</h6>
                                <h6 class="font-extrabold mb-0">{{ $moderatorsCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Отчёты -->
            <div class="col-6 col-lg-3 col-md-6 mt-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon orange">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Отчёты</h6>
                                <h6 class="font-extrabold mb-0">{{ $reportsCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Комиссии -->
            <div class="col-6 col-lg-3 col-md-6 mt-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Комиссии</h6>
                                <h6 class="font-extrabold mb-0">${{ $commissions ?? 0 }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Статистика активности -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Статистика платформы</h4>
            </div>
            <div class="card-body">
                <div id="chart-admin-overview"></div>
            </div>
        </div>
    </section>
</x-app-layout>
