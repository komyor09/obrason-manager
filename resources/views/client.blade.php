<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Клиенты</h3>
                <p class="text-subtitle text-muted">Список всех клиентов и их активность</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Клиенты</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <!-- Всего клиентов -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Всего клиентов</h6>
                                <h6 class="font-extrabold mb-0">1,230</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Активные клиенты -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="bi bi-person-check"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Активные</h6>
                                <h6 class="font-extrabold mb-0">1,010</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Новые клиенты -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="bi bi-person-plus"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Новые</h6>
                                <h6 class="font-extrabold mb-0">45</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VIP клиенты -->
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon yellow">
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">VIP</h6>
                                <h6 class="font-extrabold mb-0">12</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица клиентов -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Список клиентов</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Пример строки -->
                        <tr>
                            <td>1</td>
                            <td>Иван Иванов</td>
                            <td>ivan@mail.com</td>
                            <td>+998901234567</td>
                            <td><span class="badge bg-success">Активен</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Редактировать</button>
                                <button class="btn btn-sm btn-danger">Удалить</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
