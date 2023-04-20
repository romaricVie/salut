<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations sur le profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de profil et l\'adresse e-mail de votre compte.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Nouvelle photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Rétirer la photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        
         <!-- cover-photo -->

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nom') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>


        <!-- Firstname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="firstname" value="{{ __('Prénoms') }}" />
            <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model.defer="state.firstname" autocomplete="firstname" />
            <x-jet-input-error for="firstname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <!-- Country -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('Pays') }}" />
            <x-jet-input id="country" type="text" name="country" class="mt-1 block w-full" wire:model.defer="state.country" />
            <x-jet-input-error for="country" class="mt-2" />
        </div>
                <!-- City -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('Ville(lieu habitation)') }}" />
            <x-jet-input id="city" type="text" name="city" class="mt-1 block w-full" wire:model.defer="state.city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>
            <!--Job-->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="job" value="{{ __('Fonction') }}" />
            <x-jet-input id="job" type="text" name="job" class="mt-1 block w-full" wire:model.defer="state.job" />
            <x-jet-input-error for="job" class="mt-2" />
        </div>
          <!--Religion-->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="religion" value="{{ __('Votre réligion?') }}" />
            <x-jet-input id="religion" type="text" name="religion" class="mt-1 block w-full" wire:model.defer="state.religion" />
            <x-jet-input-error for="religion" class="mt-2" />
        </div>
        <!--Année de conversion-->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="conversion_date" value="{{ __('Année de conversion(En quelle année vous  avez accepté véritablement le Seigneur Jésus-Christ?)') }}" />
            <x-jet-input id="conversion_date" type="text" name="conversion_date" class="mt-1 block w-full" wire:model.defer="state.conversion_date" />
            <x-jet-input-error for="conversion_date" class="mt-2" />
        </div>
         <!--Bapteme-->
         
         <!--web site-->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="web" value="{{ __('Votre site web') }}" />
            <x-jet-input id="web" type="url" name="web" class="mt-1 block w-full" wire:model.defer="state.web" />
            <x-jet-input-error for="web" class="mt-2" />
        </div>

         <!--Bio-->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bio" value="{{ __('Votre Biographie') }}" />
            <textarea id="bio" type="text" class="mt-1 block w-full" wire:model.defer="state.bio" placeholder="Ecrire votre Biographie" ></textarea>
            <x-jet-input-error for="bio" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Enregistré.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Mettre à jour mon profil') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
