<x-app-layout>
<x-slot name="header">
        <div class="flex flex-row justify-between align-center">
            <div class="basis1/4">
                <p class="" style="font-size: 28px !important;">
                    {{ __('Posts') }}
                </p>
            </div>
           
            <div class="basis-1/4">
                <a href="/blog/register" class="btn btn-primary">REGISTER</a>
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
                {{--@php
                $id_no = 1;
                @endphp
                @foreach($users as $user)--}}
                <tr>
                    <td class="py-3 text-center">{{--$id_no--}}</td>
                    <td class="py-3 text-center">{{--$user->name--}}</td>
                    <td class="py-3 text-center">{{--$user->email--}}</td>
                    <!-- <td class="py-3 text-center">{{--$user->password--}}</td> -->
                    <td class="py-3 text-center">
                        <a href="user/{{--$user->id--}}/edit" class="btn btn-primary">Edit</a>
                        <a href="user/{{--$user->id--}}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
               {{-- @endforeach --}}
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