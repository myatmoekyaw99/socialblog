<x-app-layout>
    <x-slot name="header">
    <div class="flex flex-row justify-between align-center">
            <div class="basis-1/4">
                <p class="" style="font-size: 28px !important;">
                    {{ __('Posts') }}
                </p>
            </div>
           
            <!-- <div class="basis-1/4">
                <a href="/blog/register" class="btn btn-primary">REGISTER</a>
            </div> -->
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Register
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Register</h1>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}" class="mx-auto bg-white px-5">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> -->

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <table id="example" class="table table-bordered table-striped">
            <thead class="">
                <tr>
                    <th class=" text-center">#</th>
                    <th class=" text-center ">Name</th>
                    <th class="text-center">Email</th>
                    <!-- <th class=" text-center">Password</th> -->
                    <th class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $id_no = 1;
                @endphp
                @foreach($users as $user)
                <tr>
                    <td class="py-3 text-center">{{$id_no}}</td>
                    <td class="py-3 text-center">{{$user->name}}</td>
                    <td class="py-3 text-center">{{$user->email}}</td>
                    <!-- <td class="py-3 text-center">{{--$user->password--}}</td> -->
                    <td class="py-3 text-center">
                        <a href="user/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                        <a href="user/{{$user->id}}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
               @endforeach 
            </tbody>
        </table>

        </div>
    </div>
</x-app-layout>
<script>
    $(function() {
        $("#example").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["excel", "pdf", "print"]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>