<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Курьеры</h3>
                <p class="text-subtitle text-muted">Список всех курьеров в системе</p>
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
    @php
        $delivers = collect([
            (object) [
                'id' => 1,
                'name' => 'Алибек',
                'phone' => '+992900000001',
                'email' => 'alibek@example.com',
                'status' => 'Активен',
            ],
            (object) [
                'id' => 2,
                'name' => 'Фарҳод',
                'phone' => '+992900000002',
                'email' => 'farhod@example.com',
                'status' => 'Ожидает',
            ],
            (object) [
                'id' => 3,
                'name' => 'Саида',
                'phone' => '+992900000003',
                'email' => 'saida@example.com',
                'status' => 'Активен',
            ],
            (object) [
                'id' => 4,
                'name' => 'Нодир',
                'phone' => '+992900000004',
                'email' => 'nodir@example.com',
                'status' => 'Неактивен',
            ],
        ]);
    @endphp


    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Список курьеров</h4>
                <a href="{{ route('deliver.create') }}" class="btn btn-primary">Добавить курьера</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($delivers as $deliver)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $deliver->name }}</td>
                                <td>{{ $deliver->phone }}</td>
                                <td>{{ $deliver->status }}</td>
                                <td>
                                    <a href="{{ route('deliver.edit', $deliver->id) }}"
                                        class="btn btn-sm btn-warning">Редактировать</a>
                                    <form action="{{ route('deliver.destroy', $deliver->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($delivers->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Курьеров пока нет.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
