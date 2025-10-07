<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Сессии браузера
            </h4>
            <p class="card-description">
                Управляйте активными сессиями в других браузерах и на устройствах, а также выходите из них.
            </p>
        </div>
        <div class="card-body">
            <div class='alert alert-light-warning'>
                При необходимости вы можете выйти из всех других сессий браузера на всех ваших устройствах. Ниже приведён список некоторых последних сессий, однако он может быть неполным. Если вы считаете, что ваш аккаунт был скомпрометирован, также обновите пароль.
            </div>

            @if (count($this->sessions) > 0)
                <div class="mt-5 space-y-6">
                    <!-- Другие сессии браузера -->
                    @foreach ($this->sessions as $session)
                        <div class="d-flex align-items-center">
                            <div>
                                @if ($session->agent->isDesktop())
                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="text-gray-500" style="width: 40px; height: 40px">
                                        <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500" style="width: 40px; height: 40px">
                                        <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                    </svg>
                                @endif
                            </div>

                            <div class="ms-3">
                                <div class="text-sm text-gray-600">
                                    {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">
                                        {{ $session->ip_address }},

                                        @if ($session->is_current_device)
                                            <span class="text-green-500 font-semibold">Это устройство</span>
                                        @else
                                            Последняя активность: {{ $session->last_active }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-5">
                <x-maz-alert class="ml-3" color="success" on="loggedOut">
                    Готово.
                </x-maz-alert>

                <button wire:click="confirmLogout" wire:loading.attr="disabled" class='btn btn-danger'>
                    Выйти из других сессий браузера
                </button>

                <!-- Модальное окно подтверждения выхода с других устройств -->
                <x-jet-dialog-modal wire:model="confirmingLogout">
                    <x-slot name="title">
                        Выйти из других сессий браузера
                    </x-slot>

                    <x-slot name="content">
                        Пожалуйста, введите пароль, чтобы подтвердить выход из всех других сессий браузера на ваших устройствах.

                        <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Пароль"
                                   x-ref="password"
                                   wire:model.defer="password"
                                   wire:keydown.enter="logoutOtherBrowserSessions" />

                            <x-maz-input-error for="password" class="mt-2" />
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <button class='btn btn-outline-secondary' wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                            Отмена
                        </button>

                        <button class="btn btn-danger"
                                wire:click="logoutOtherBrowserSessions"
                                wire:loading.attr="disabled">
                            Выйти из других сессий браузера
                        </button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</section>
