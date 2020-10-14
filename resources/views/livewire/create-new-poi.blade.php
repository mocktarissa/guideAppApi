<div wire:id="iFTKQTfvpO4Oc0Qfy8Ve" class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Create a New POI</h3>

            <p class="mt-1 text-sm text-gray-600">
                Add a new POI
            </p>
        </div>
    </div>


    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="updateProfileInformation">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Profile Photo -->
                        <div class="col-span-6 sm:col-span-4">
                            <picture> <img src="" alt=""></picture>
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                Main Picture
                            </label>

                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mainpicture" type="file" wire:model.defer="state.mainpicture" autocomplete="mainpicture">


                        </div>
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                Name
                            </label>

                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name" type="text" wire:model.defer="state.name" autocomplete="name">


                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="description">
                                Description
                            </label>

                            <textarea class="form-input rounded-md block w-full text-grey-darkest  bg-transparent" name="tt"></textarea>


                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Email
                            </label>

                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" type="email" wire:model.defer="state.email">


                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('iFTKQTfvpO4Oc0Qfy8Ve').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;" class="text-sm text-gray-600 mr-3">
                        Saved.
                    </div>


                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>