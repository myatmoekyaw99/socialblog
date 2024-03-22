<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table id="example" class="display" style="width: 100%;">
                    <thead class="bg-gray-100 rounded-md">
                        <tr>
                            <th class="py-5 text-center">#</th>
                            <th class="py-5 text-center">Name</th>
                            <th class="py-5 text-center">Email</th>
                            <th class="py-5 text-center">Password</th>
                            <th class="py-5 text-center">Action</th>
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
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>

