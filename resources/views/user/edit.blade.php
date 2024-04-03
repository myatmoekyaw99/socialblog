<x-app-layout>
    <div class="row bg-gray-300 mt-5">
    <form method="POST" action="/user/{{$user->id}}/update" class="card col-11 col-md-8 mx-auto p-5" enctype="multipart/form-data">
        <h1 class="mb-4 display-5 fw-bold">Edit User</h1>
        @csrf
        <!-- Name -->
        <div style="width:90%">
            <x-input-label class="fw-bold fs-6" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="__($user->name)" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4" style="width:90%">
            <x-input-label class="fw-bold fs-6" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="__($user->email)" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- bio -->
        <div class="mt-4" style="width: 90%;">
            <x-input-label class="fw-bold fs-6" for="bio" :value="__('Bio')" />

            <textarea id="bio" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="bio" required>{{$user->bio}}
            </textarea>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt4 d-flex align-center justify-between" style="width: 90%;">
            <div class="mt-4 d-flex align-center">
                <x-text-input id="check_profile" class="mt-1 border-primary" type="checkbox" name="check_profile"/>&nbsp;&nbsp;
                <span class="fw-bold">Click here to change profile</span>
            </div>
            <div class="mt-4 d-flex align-center justify-items-end">
                <x-text-input id="check_password" class="mt-1 border-primary" type="checkbox" name="check_password"/>&nbsp;&nbsp;
                <span class="fw-bold">Click here to change password</span>
            </div>
        </div>
        
        <!-- profile -->
        <div class="mt-4" style="width: 90%; display:none;" id="profile_section">
            <x-input-label class="fw-bold fs-6" for="new_profile" :value="__('Profile')" />
            <x-text-input id="new_profile" class="block mt-1 w-full" type="file" name="new_profile" />
            <x-text-input id="old_profile" class="block mt-1 w-full" type="hidden" name="old_profile" :value="__($user->profile)" />
            <!-- <x-input-error :messages="$errors->get('new_profile')" class="mt-2" /> -->
        </div>

        <!-- Password -->
        <div class="mt-4" style="width:90%; display:none;" id="password_section" >
            <x-input-label class="fw-bold fs-6" for="password" :value="__('Change Password')" class="pl-5"/>
            <x-text-input id="new_password" class="block mt-1 w-full"
                            type="password"
                            name="new_password"
                            placeholder="Enter new password if you want to change"/>

            <!-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> -->
        </div>

        <div class="flex items-center justify-start mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> -->

            <x-primary-button class="">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>
<script>
    const newPassCheck = document.getElementById('check_password');
    const passwordField = document.getElementById('password_section');
    
    const newProfileCheck = document.getElementById('check_profile');
    const profileField = document.getElementById('profile_section');

    newPassCheck.addEventListener('change', function() {
        if (this.checked) {
            passwordField.style.display = 'block';
        } else {
            passwordField.style.display = 'none';
        }
    });

    newProfileCheck.addEventListener('change', function() {
        if (this.checked) {
            profileField.style.display = 'block';
        } else {
            profileField.style.display = 'none';
        }
    });
</script>
