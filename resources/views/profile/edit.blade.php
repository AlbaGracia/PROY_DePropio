@section('title', __('labels.profile'))

<x-app-layout>
    <div class="pt-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            @unlessrole('admin')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-7xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @endunlessrole
        </div>
    </div>
</x-app-layout>
