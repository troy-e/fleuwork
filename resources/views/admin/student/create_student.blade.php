<x-layout>
    <x-slot:title>Add New Student</x-slot:title>

    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">

            <!-- Form -->
            <form action="{{ route('students.store') }}" method="POST" class="space-y-5">
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

                <!-- Input Kelas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kelas</label>
                    <select name="grade_id" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm">
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Jurusan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="department_id" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-sm">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition ease-in-out duration-300">
                        Save Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
