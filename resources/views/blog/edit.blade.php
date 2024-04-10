<x-app-layout>
<x-slot name="header">
    <!-- <div class="flex flex-row justify-between align-center">
        <div class="basis-1/4">
            <p style="font-size: 28px !important;">
                {{ __('Post Edit') }}
            </p>
        </div>
           
    </div> -->
    </x-slot>
    <div class="row bg-gray-300 mt-5">
    <form method="POST" action="{{route('blog.update',$blog->id)}}" class="card col-11 col-md-8 mx-auto p-5" enctype="multipart/form-data">
        <h1 class="mb-4 display-5 fw-bold">Edit Blog</h1>
        @csrf
        <!-- Title -->
        <div style="width:90%">
            <x-input-label class="fw-bold fs-6" for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="__($blog->title)" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

         <!-- Category -->
        <div class="mt-4" style="width:90%">
            <x-input-label class="fw-bold fs-6" for="category" :value="__('Category')" />
            <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="__($blog->category)" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4" style="width: 90%;">
            <x-input-label class="fw-bold fs-6" for="description" :value="__('Description')" />
            <textarea id="bio" name="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="bio" required>{{$blog->description}}
            </textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt4 d-flex align-center justify-between" style="width: 90%;">
            <div class="mt-4 d-flex align-center">
                <x-text-input id="check_profile" class="mt-1 border-primary" type="checkbox" name="check_profile"/>&nbsp;&nbsp;
                <span class="fw-bold">Click here to change photo</span>
            </div>
            <!-- <div class="mt-4 d-flex align-center justify-items-end">
                <x-text-input id="check_password" class="mt-1 border-primary" type="checkbox" name="check_password"/>&nbsp;&nbsp;
                <span class="fw-bold">Click here to change password</span>
            </div> -->
        </div>

        <div class="mt-4" style="width: 90%; display:none;" id="profile_section">
            <x-input-label class="fw-bold fs-6" for="new_profile" :value="__('Profile')" />
            <x-text-input id="new_photo" class="block mt-1 w-full" type="file" name="new_photo" />
            <x-text-input id="old_photo" class="block mt-1 w-full" type="hidden" name="old_photo" :value="__($blog->photo)" />
            <x-input-error :messages="$errors->get('new_photo')" class="mt-2" />
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
    
    const newProfileCheck = document.getElementById('check_profile');
    const profileField = document.getElementById('profile_section');

    newProfileCheck.addEventListener('change', function() {
        if (this.checked) {
            profileField.style.display = 'block';
        } else {
            profileField.style.display = 'none';
        }
    });
</script>