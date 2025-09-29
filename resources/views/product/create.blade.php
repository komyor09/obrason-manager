<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Добавить товар</h3>
                <p class="text-subtitle text-muted">Форма для добавления нового продукта в систему</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель управления</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products') }}">Товары</a></li>
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
                        <h4 class="card-title">Новый товар</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Название товара" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Описание товара"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Цена</label>
                                <input type="number" step="0.01" id="price" name="price" class="form-control" placeholder="100.00" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="stock" class="form-label">Количество на складе</label>
                                <input type="number" id="stock" name="stock" class="form-control" placeholder="10" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Изображение товара</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                            </div>
                            <div class="form-actions d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Сохранить</button>
                                <a href="{{ route('products') }}" class="btn btn-light">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
