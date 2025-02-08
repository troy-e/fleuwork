<x-admin-layout>
    <div class="container mx-auto p-6">
        <!-- Header dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('student.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition ease-in-out duration-300">
                <i class="fas fa-plus mr-2"></i> Add Student
            </a>
            <form class="flex items-center" method="GET" action="{{ route('admin.students.search') }}">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                             viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input type="text" id="simple-search" name="search"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Search" required="">
                </div>
            </form>
        </div>

        <!-- Tabel Data Siswa -->
        <div class="overflow-hidden rounded-lg shadow-lg border border-gray-200 bg-white">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Grade</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Address</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($students as $student)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->grade->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->address }}</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <!-- Lihat Detail -->
                                    <a href="{{ route('students.show', $student->id) }}" title="Lihat Detail">
                                        <svg class="w-6 h-6 text-gray-500 hover:text-blue-500 transition duration-150 ease-in-out" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    <!-- Edit -->
                                    <a href="{{ route('students.edit', $student->id) }}" title="Edit Data">
                                        <svg class="w-6 h-6 text-gray-500 hover:text-yellow-500 transition duration-150 ease-in-out" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                    <!-- Hapus -->
                                    <button type="button" onclick="showDeleteModal('{{ route('students.destroy', $student->id) }}')" title="Hapus Data">
                                        <svg class="w-6 h-6 text-gray-500 hover:text-red-500 transition duration-150 ease-in-out" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No results found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
            <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Modal -->
    <script>
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const cancelButton = document.getElementById('cancelButton');

        function showDeleteModal(actionUrl) {
            deleteForm.action = actionUrl;
            deleteModal.classList.remove('hidden');
        }

        cancelButton.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
        });
    </script>
</x-admin-layout>
