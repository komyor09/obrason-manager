<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Заказы 📦</h3>
                <p class="text-subtitle text-muted">Управление заказами и статистика</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель управления</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Заказы</li>
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

            <!-- Всего клиентов -->
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

        <!-- Таблица заказов -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Последние заказы</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Клиент</th>
                                <th>Адрес</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1523</td>
                                <td>Иван Петров</td>
                                <td>ул. Ленина 12</td>
                                <td>$32</td>
                                <td><span class="badge bg-success">Доставлен</span></td>
                                <td>27.09.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Подробнее</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1524</td>
                                <td>Анна Иванова</td>
                                <td>пр. Мира 45</td>
                                <td>$18</td>
                                <td><span class="badge bg-warning">В пути</span></td>
                                <td>27.09.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Подробнее</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1525</td>
                                <td>Олег Сидоров</td>
                                <td>ул. Горького 7</td>
                                <td>$50</td>
                                <td><span class="badge bg-danger">Отменён</span></td>
                                <td>26.09.2025</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Подробнее</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
