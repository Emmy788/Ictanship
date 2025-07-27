<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Department</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="department_head" class="block text-sm font-medium text-gray-700">Head of Department</label>
                <input type="text" name="department_head" id="department_head" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="is_active" class="inline-flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out" value="1">
                    <span class="ml-2 text-sm text-gray-700">Is Active</span>
                </label>
            </div>
            <div class="mb-4">
                <label for="created_by" class="block text-sm font-medium text-gray-700">Created By</label>
                <input type="text" name="created_by" id="created_by" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="">
            </div>
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Department</button>
            </div>
        </form>
        <a href="{{ route('departments.index') }}" class="text-blue-500 hover:underline">Back to Departments</a>
    </div>
    @if($errors->any())
    <div class="text-red-600">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
</body>
</html>