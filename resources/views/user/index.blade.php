<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="mt-3 container-fluid">
        <table id="example" class="table table-bordered table-striped" style="width: 100%;">
            <thead class="">
                <tr>
                    <th class=" text-center">#</th>
                    <th class=" text-center ">Name</th>
                    <th class="text-center">Email</th>
                    <th class=" text-center">Password</th>
                    <th class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-3 text-center">1</td>
                    <td class="py-3 text-center">John Doe</td>
                    <td class="py-3 text-center">john@example.com</td>
                    <td class="py-3 text-center">45678</td>
                    <td class="py-3 text-center">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>  
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

