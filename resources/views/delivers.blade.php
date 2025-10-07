<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Курьеры 🚚</h3>
                <p class="text-subtitle text-muted">Управление курьерами и их активностью</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель управления</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Курьеры</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <!-- Активные курьеры -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-person-check-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Онлайн</h6>
                                <h6 class="font-extrabold mb-0">8</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Всего курьеров -->
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
                                <h6 class="text-muted font-semibold">Всего курьеров</h6>
                                <h6 class="font-extrabold mb-0">25</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Заказы в пути -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon orange">
                                    <i class="bi bi-truck"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Заказы в пути</h6>
                                <h6 class="font-extrabold mb-0">32</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Курьеры на паузе -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="bi bi-person-dash-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">На паузе</h6>
                                <h6 class="font-extrabold mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица курьеров -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Список курьеров</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Статус</th>
                                <th>Последний заказ</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Иван Петров</td>
                                <td>+7 999 123 45 67</td>
                                <td><span class="badge bg-success">Онлайн</span></td>
                                <td>Заказ #1523</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Подробнее</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Анна Иванова</td>
                                <td>+7 999 765 43 21</td>
                                <td><span class="badge bg-warning">В пути</span></td>
                                <td>Заказ #1524</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Подробнее</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Олег Сидоров</td>
                                <td>+7 999 111 22 33</td>
                                <td><span class="badge bg-danger">На паузе</span></td>
                                <td>Заказ #1520</td>
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
