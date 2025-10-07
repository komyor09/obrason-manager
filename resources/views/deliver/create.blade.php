<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Добавить курьера</h3>
                <p class="text-subtitle text-muted">Форма для добавления нового курьера в систему</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель управления</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('delivers') }}">Курьеры</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Добавить</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Новый курьер</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('deliver.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Имя курьера" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Телефон</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="+998 99 999 99 99" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Статус</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active">Активен</option>
                                    <option value="inactive">Не активен</option>
                                </select>
                            </div>
                            <div class="form-actions d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Сохранить</button>
                                <a href="{{ route('delivers') }}" class="btn btn-light">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
