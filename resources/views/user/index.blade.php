<x-app-layout>
<x-auth-session-status :status="session('success')"/>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot> --}}

    <div class="w-5">
        <a href="/user/register" class="btn btn-primary m-2">REGISTER</a>
    </div>
    <div class="mt-3 container-fluid table-responsive">
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
                    <!-- <td class="py-3 text-center">{{$user->password}}</td> -->
                    <td class="py-3 text-center">
                        <a href="user/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                        <a href="user/{{$user->id}}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // responsive: true,
        });
    });
</script>

