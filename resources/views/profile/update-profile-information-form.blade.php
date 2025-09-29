<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Информация профиля') }}</h4>
            <p class="card-description">
                {{ __('Обновите информацию профиля вашей учетной записи и адрес электронной почты.') }}</p>
        </div>
        <div class="card-body">

            <x-maz-alert class="mr-3" on="saved" color='success'>
                Сохранено
            </x-maz-alert>
            <form wire:submit.prevent="updateProfileInformation">

                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-6 col-sm-4">
                        <input type="file" class="d-none" wire:model="photo" x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                        <x-jet-label for="photo" value="{{ __('Фото') }}" />

                        <div>
                            <div class="avatar avatar-full bg-warning mt-2" x-show="! photoPreview">
                                <img src="{{ asset('storage/' . $this->user->profile_photo_path) }}"
                                    alt="{{ $this->user->name }}">
                            </div>

                        </div>

                        <div class="mt-2" x-show="photoPreview">
                            <div
                                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                photoPreview + '\'); width: 250px; height: 250px;'">
                            </div>
                        </div>

                        <x-jet-secondary-button class="mt-2 mr-2" type="button"
                            x-on:click.prevent="$refs.photo.click()">
                            {{ __('Выберите новое фото') }}
                        </x-jet-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Удалить фото') }}
                            </x-jet-secondary-button>
                        @endif

                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>
                @endif


                <!-- Name -->
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input id="name" type="text"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.name" autocomplete="name">
                    <x-maz-input-error for="name" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Почта') }}" />
                    <input type="email" name="email " id="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.email">
                    <x-maz-input-error for="email" />
                </div>


                <button class="btn btn-primary float-end mt-2" wire:loading.attr="disabled"
                    wire:target="photo">Сохранить</button>
            </form>
        </div>
    </div>
</section>
