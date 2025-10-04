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

    @php
        $delivers = collect([
            (object) ['id' => 1, 'name' => 'Алибек', 'phone' => '+992900000001', 'status' => 'Онлайн'],
            (object) ['id' => 2, 'name' => 'Фарҳод', 'phone' => '+992900000002', 'status' => 'В пути'],
            (object) ['id' => 3, 'name' => 'Саида', 'phone' => '+992900000003', 'status' => 'На паузе'],
            (object) ['id' => 4, 'name' => 'Нодир', 'phone' => '+992900000004', 'status' => 'Неактивен'],
        ]);
    @endphp

    <section class="section">
        <!-- Статистика -->
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon green me-3">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                        <div>
                            <h6 class="text-muted">Онлайн</h6>
                            <h6 class="font-extrabold mb-0">{{ $delivers->where('status', 'Онлайн')->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon blue me-3">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h6 class="text-muted">Всего курьеров</h6>
                            <h6 class="font-extrabold mb-0">{{ $delivers->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon orange me-3">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h6 class="text-muted">В пути</h6>
                            <h6 class="font-extrabold mb-0">{{ $delivers->where('status', 'В пути')->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon red me-3">
                            <i class="bi bi-person-dash-fill"></i>
                        </div>
                        <div>
                            <h6 class="text-muted">На паузе</h6>
                            <h6 class="font-extrabold mb-0">{{ $delivers->where('status', 'На паузе')->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Список курьеров</h4>
                <a href="{{ route('deliver.create') }}" class="btn btn-primary">Добавить курьера</a>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0">
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
                                <td>
                                    <span class="badge
                                        @if($deliver->status == 'Онлайн') bg-success
                                        @elseif($deliver->status == 'В пути') bg-warning
                                        @elseif($deliver->status == 'На паузе') bg-danger
                                        @else bg-secondary @endif">
                                        {{ $deliver->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('deliver.edit', $deliver->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                                    <form action="{{ route('deliver.destroy', $deliver->id) }}" method="POST" class="d-inline">
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
