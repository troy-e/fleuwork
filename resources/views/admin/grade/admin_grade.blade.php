<x-admin-layout>
    <div class="container mx-auto p-6">
        <!-- Header dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('admin.grades.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition ease-in-out duration-300">
                <i class="fas fa-plus mr-2"></i> Add Grade
            </a>

            <div class="flex gap-4">
                <form action="{{ route('admin.grades.search') }}" method="GET"
                      class="flex gap-2 bg-white rounded-lg p-2 shadow-sm">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search"
                           class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                  placeholder-gray-400 text-gray-700 focus:outline-none
                                  focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                                  transition-colors w-64">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600
                                   font-medium transition-colors">
                        Search
                    </button>

                    @if(request('search'))
                        <a href="{{ route('admin.grades.index')}}"
                           class="px-4 py-2 bg-red-500 text-white hover:text-gray-700 transition-colors
                                  flex items-center">
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Tabel Data Grade -->
        <div class="overflow-hidden rounded-lg shadow-lg border border-gray-200 bg-white">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Grade Name</th>
                        <th class="px-6 py-3">Students</th>
                        <th class="px-6 py-3">Department</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($grades as $grade)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $grade->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $grade->name }}</td>
                            <!-- Di bagian Students column -->
                            <td class="px-6 py-4 text-sm text-gray-700">
                                 @if($grade->students->count() > 0)
                             <div class="max-h-20 overflow-y-auto">
                         @foreach($grade->students as $student)
                          <div>{{ $student->name }}</div>
                         @endforeach
                         </div>
                       @else
                   <span class="text-gray-400">No students</span>
                      @endif
                        </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $grade->department->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.grades.edit', $grade->id) }}" title="Edit Data">
                                        <svg class="w-6 h-6 text-gray-500 hover:text-yellow-500 transition duration-150 ease-in-out" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                    <!-- Hapus -->
                                    <button type="button" onclick="showDeleteModal('{{ route('admin.grades.destroy', $grade->id) }}')" title="Hapus Data">
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
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No results found</td>
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
