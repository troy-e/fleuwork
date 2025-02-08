<x-admin-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Siswa</h1>

            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Nama</p>
                            <p class="text-lg font-medium text-gray-900">{{ $student->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Email</p>
                            <p class="text-lg font-medium text-gray-900">{{ $student->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Alamat</p>
                            <p class="text-lg font-medium text-gray-900">{{ $student->address }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Grade</p>
                            <p class="text-lg font-medium text-gray-900">{{ $student->grade->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Department</p>
                            <p class="text-lg font-medium text-gray-900">{{ $student->department->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('students.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition duration-150 ease-in-out">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke daftar siswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
