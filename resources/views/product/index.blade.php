<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Товары</h3>
                <p class="text-subtitle text-muted">Список всех товаров в системе</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель управления</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Товары</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>
    @php
        $products = collect([
            (object) [
                'id' => 1,
                'name' => 'Молоко',
                'price' => 5.5,
                'stock' => 10,
                'status' => 'В наличии',
            ],
            (object) [
                'id' => 2,
                'name' => 'Хлеб',
                'price' => 1.2,
                'stock' => 50,
                'status' => 'В наличии',
            ],
            (object) [
                'id' => 3,
                'name' => 'Яблоки',
                'price' => 2.0,
                'stock' => 30,
                'status' => 'Ожидается',
            ],
        ]);
    @endphp
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Список товаров</h4>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить товар</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Редактировать</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($products->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Товаров пока нет.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
