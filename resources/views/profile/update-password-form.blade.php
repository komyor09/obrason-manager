<div class='card' submit="updatePassword">
    <div class="card-header">
        <h4 class="card-title">{{ __('Обновить пароль') }}</h4>
        <p class="card-description">
            {{ __('Убедитесь, что ваш аккаунт использует длинный и случайный пароль для безопасности.') }}</p>
    </div>
    <div class="card-body">

        <x-maz-alert color="success" on="saved">
            {{ __('Сохранено.') }}
        </x-maz-alert>
        <form wire:submit.prevent="updatePassword">

            <div class="form-group">
                <label for="current_password">{{ __('Текущий пароль') }}</label>
                <input id="current_password" type="password"
                    class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                    name="current_password" wire:model.defer="state.current_password" autocomplete="current-password">
                <x-maz-input-error for="current_password" />
            </div>

            <div class="form-group">
                <label for="password">{{ __('Новый пароль') }}</label>
                <input id="password" type="password"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
                    wire:model.defer="state.password" autocomplete="new-password">
                <x-maz-input-error for="password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Подтвердите пароль') }}</label>
                <input id="password_confirmation" type="password"
                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password"
                    wire:model.defer="state.password_confirmation" autocomplete="new-password">
                <x-maz-input-error for="password_confirmation" />
            </div>

            <button class="btn btn-primary float-end mt-2" wire:loading.attr="disabled"
                wire:target="updatePassword">Сохранить</button>
        </form>

    </div>
</div>
