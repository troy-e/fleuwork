<x-admin-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Department</h1>

            <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Department Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Department Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $department->name) }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department Description Input -->
                    <div>
                        <label for="desc" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="desc"
                                  id="desc"
                                  rows="4"
                                  required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('desc') border-red-500 @enderror">{{ old('desc', $department->desc) }}</textarea>
                        @error('desc')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('admin.departments.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Update Department
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
