<x-app-layout>
    <x-slot name="header">
        <h3>Редактировать курьера</h3>
    </x-slot>

    <div class="card p-4">
        <form action="{{ route('deliver.update', $deliver->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Имя</label>
                <input type="text" name="name" class="form-control" value="{{ $deliver->name }}" required>
            </div>
            <div class="mb-3">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="{{ $deliver->phone }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $deliver->email }}">
            </div>
            <div class="mb-3">
                <label>Статус</label>
                <select name="status" class="form-control">
                    <option value="Активен" @selected($deliver->status == 'Активен')>Активен</option>
                    <option value="Неактивен" @selected($deliver->status == 'Неактивен')>Неактивен</option>
                    <option value="Ожидает" @selected($deliver->status == 'Ожидает')>Ожидает</option>
                </select>
            </div>
            <button class="btn btn-warning">Обновить</button>
        </form>
    </div>
</x-app-layout>
