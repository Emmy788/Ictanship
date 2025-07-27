<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Departments</title>
</head>
<body>
    <!-- Loop through the departments passed in and display them in a table -->
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Departments</h1>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
            </div>
        @endif

        <table class="table-auto min-w-full bg-white border-gray-300">
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Head of Department</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $department->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $department->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $department->department_head }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                        <td>
                            <!-- View button  -->
                            <a href="{{ route('departments.show', $department->id) }}"
                            class="inline-block text-green-600 hover:underline">
                                View
                            </a>
                        </td>   

                        <td>
                             <!-- Edit button -->
                            <a href="{{ route('departments.edit', $department->id) }}" class="text-blue-500 hover:underline">
                                Edit
                            </a>
                        </td>

                        <td>
                            <!-- Delete form -->
                            <form action="{{ route('departments.destroy', $department->id) }}"
                                method="POST"
                                style="display: inline"
                                onsubmit="return confirm('Are you sure you want to delete this department?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-700 hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>