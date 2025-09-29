<div class='card'>
    <div class='card-header'>
        <h4 class="card-title">Удалить аккаунт</h4>
        <p class="card-description">
            Полное удаление вашего аккаунта.
        </p>
    </div>
    <div class="card-body">
        <p>
            После удаления аккаунта все его ресурсы и данные будут безвозвратно удалены.
            Перед удалением, пожалуйста, скачайте все данные или информацию, которую хотите сохранить.
        </p>
        <div class="mt-5">
            <button class="btn btn-danger" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                Удалить аккаунт
            </button>
        </div>

        <!-- Модальное окно подтверждения удаления -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                Удалить аккаунт
            </x-slot>

            <x-slot name="content">
                Вы уверены, что хотите удалить свой аккаунт? После удаления все ресурсы и данные будут безвозвратно удалены.
                Пожалуйста, введите пароль для подтверждения удаления аккаунта.

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Пароль"
                           x-ref="password"
                           wire:model.defer="password"
                           wire:keydown.enter="deleteUser" />

                    <x-maz-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class='btn btn-outline-secondary' wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Отмена
                </button>

                <button class="btn btn-danger" wire:click="deleteUser" wire:loading.attr="disabled">
                    Удалить аккаунт
                </button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
