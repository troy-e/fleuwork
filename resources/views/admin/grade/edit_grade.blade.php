<x-admin-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Grade</h1>

            <form action="{{ route('admin.grades.update', $grade->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Grade Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Grade Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $grade->name) }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department Selection -->
                    <div>
                        <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                        <select name="department_id"
                                id="department_id"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('department_id') border-red-500 @enderror">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == $grade->department_id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('admin.grades.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Update Grade
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
