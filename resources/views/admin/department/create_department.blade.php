<x-admin-layout>
    <x-slot:title>Add New Department</x-slot:title>

    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
            <!-- Form -->
            <form action="{{ route('admin.departments.store') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Input Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm"
                        placeholder="Department name">
                </div>

                <!-- Input Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="desc" required rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm"
                        placeholder="Department description"></textarea>
                </div>

                <div class="flex items-center justify-between space-x-4 mt-6">
                    <a href="{{ route('admin.departments.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>
                    <button type="submit"
                        class="w-full max-w-xs bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition ease-in-out duration-300">
                        Save Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
