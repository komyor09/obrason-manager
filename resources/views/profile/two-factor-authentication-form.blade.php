<div class='card'>
    <div class='card-header'>
        <h4 class="card-title">Двухфакторная аутентификация</h4>
        <p class="card-description">
            Добавьте дополнительную защиту к своей учетной записи с помощью двухфакторной аутентификации.
        </p>
    </div>
    <div class="card-body">
        <h5 class='text-danger'>
            @if ($this->enabled)
                Вы включили двухфакторную аутентификацию.
            @else
                Двухфакторная аутентификация не включена.
            @endif
        </h5>
        <p>
            Когда двухфакторная аутентификация включена, при входе в систему вам нужно будет ввести безопасный случайный токен. Этот токен можно получить в приложении-аутентификаторе на вашем телефоне.
        </p>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        Двухфакторная аутентификация включена. Отсканируйте этот QR-код в приложении-аутентификаторе на телефоне.
                    </p>
                </div>

                <div class="mt-4 dark:p-4 dark:w-56 dark:bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        Сохраните эти коды восстановления в надежном менеджере паролей. Они помогут вернуть доступ к аккаунту, если вы потеряете устройство с двухфакторной аутентификацией.
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <button class='btn btn-primary' type="button" wire:loading.attr="disabled">
                        Включить
                    </button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            Сгенерировать новые коды восстановления
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            Показать коды восстановления
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        Выключить
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </div>
</div>
