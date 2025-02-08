<x-admin-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Siswa</h1>

            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $student->name }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ $student->email }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" name="address" id="address" value="{{ $student->address }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="grade_id" class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                        <select name="grade_id" id="grade_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}" {{ $grade->id == $student->grade_id ? 'selected' : '' }}>
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div>
                        <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                        <select name="department_id" id="department_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == $student->department_id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('students.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
