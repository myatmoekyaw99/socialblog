<x-app-layout>
    <div class="row bg-gray-300 mt-5">
        <div class="card col-11 col-md-8 mx-auto px-5" style="border-radius: 50px;">
        <div class="mt-1 text-center px-2 py-3">
            <h1 class="ms-2 fs-3 fw-bold"><span class="text-primary">User Profile</h1>
        </div>
        </div>
    </div>

    <div class="row bg-gray-300 mt-2">
        <div class="card col-11 col-md-8 mx-auto px-5 py-3" style="border-radius: 50px;">
            <!-- Password -->
            <div class="mt-2 position-relative" style="width:90%; z-index:1;" id="password_section" >
                <img src='{{asset("storage/{$user->profile}")}}' alt="profile" class="" style="width:200px;height:200px;border:2px solid white;outline:3px solid black;border-radius:100%;">
                <div class="position-absolute flex items-center justify-start" style="bottom:0px;">
                <a href="/user/{{$user->id}}/edit" class="inline-flex items-center ms-2 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" style="z-index:2; cursor:pointer;">
                    {{ __('Edit') }}
                </a>
                </div>
            </div>
            
            <hr class="d-none d-sm-block" style="margin-top:-100px;border-radius:10px;">
            <div class="mt-sm-5">
                <h1 class="ms-2 display-6 fw-bold mt-0 mt-sm-5">{{$user->name}}</h1>
            </div>
        </div>
    </div>

    <div class="row bg-gray-300 mt-2">
        <div class="card col-11 col-md-8 mx-auto px-5" style="border-radius: 50px;">
        <div class="mt-1 px-2 py-3">
            <p class="ms-2 fs-5 fw-bold"><span class="text-primary">Email - </span>{{$user->email}}</p>
        </div>
        </div>
    </div>

    <div class="row bg-gray-300 mt-2">
        <div class="card col-11 col-md-8 mx-auto px-5" style="border-radius: 50px;">
        <div class="mt-1 px-2 py-3">
            <p class="ms-2 fs-5 fw-bold"><span class="text-primary">Bio - </span>{{$user->bio}}</p>
        </div>
        </div>
    </div>

    <div class="row bg-gray-300 mt-2">
        <div class="card col-11 col-md-8 mx-auto py-3 px-5" style="border-radius: 10px;">
        @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>

