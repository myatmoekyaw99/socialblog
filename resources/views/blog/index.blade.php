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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Post Create</h1>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post_create') }}" class="mx-auto bg-white px-5" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <!-- <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required /> -->
                            <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="description" required></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus autocomplete="on" />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Photo -->
                        <div class="mt-4">
                            <x-input-label class="fw-bold fs-6" for="Photo" :value="__('Photo')" />

                            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" required />

                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> -->

                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
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

    @if (session('success'))
    <div class="alert alert-success alert-dismissible d-flex justify-between fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="fs-3 fw-bold">&times;</span>
        </button>
    </div>
    @elseif(session('delete'))
    <div class="alert alert-danger alert-dismissible d-flex justify-between fade show" role="alert">
        <strong>{{session('delete')}}</strong>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"  class="fs-3 fw-bold">&times;</span>
        </button>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class=" text-center">#</th>
                    <th class=" text-center ">Title</th>
                    <th class="text-center">Description</th>
                    <th class=" text-center">Category</th>
                    <th class=" text-center">Photo</th>
                    <th class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $id_no = 1;
                @endphp
                @foreach($blogs as $blog)
                <tr>
                    <td class="py-3 text-center">{{$id_no}}</td>
                    <td class="py-3 text-center">{{$blog->title}}</td>
                    <td class="py-3 text-center">{{$blog->description}}</td>
                    <td class="py-3 text-center">{{$blog->category}}</td>
                    <td class="py-3 text-center">
                            <a href="/blog/{{$blog->id}}/detail">
                                <img src='{{asset("storage/{$blog->photo}")}}' alt="profile" width="50px" height="80px" class="mx-auto rounded">
                            </a>
                        </td>
                    <td class="py-3 text-center">
                        <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('blog.delete',$blog->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                    </td>
                </tr>
                @php
                $id_no++;
                @endphp
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

        });
    });
</script>