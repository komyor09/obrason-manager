<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Товары</h3>
                <p class="text-subtitle text-muted">Список всех товаров</p>
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

    <section class="section">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить товар</a>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}"
                            style="height: 200px; object-fit:contain;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text mb-1">Цена: ${{ $product->price }}</p>
                            <p class="card-text mb-1">На складе: {{ $product->stock }}</p>
                            <p class="card-text mb-2">Статус: {{ $product->status }}</p>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-sm btn-warning">Редактировать</a>
                                <button class="btn btn-sm btn-danger">Удалить</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
