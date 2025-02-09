<x-admin-layout>
    <x-slot:title>Add New Student</x-slot:title>

    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
            <!-- Form -->
            <form action="{{ route('admin.students.store') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Input Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm"
                        placeholder="Nama siswa">
                </div>

                <!-- Input Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm"
                        placeholder="Email siswa">
                </div>

                <!-- Input Alamat -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="address" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm"
                        placeholder="Alamat siswa">
                </div>

                <!-- Combined Grade & Department Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Grade & Department</label>
                    <select name="grade_id" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm">
                        <option value="">Select Grade</option>
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}" data-department-id="{{ $grade->department_id }}">
                                {{ $grade->name }} - {{ $grade->department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hidden department_id field that will be set based on the selected grade -->
                <input type="hidden" name="department_id" value="{{ $grades->first()->department_id ?? '' }}">

                <div class="flex items-center justify-between space-x-4 mt-6">
                    <a href="{{ route('admin.students.index') }}"
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
