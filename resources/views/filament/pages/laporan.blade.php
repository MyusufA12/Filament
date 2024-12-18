<x-filament::page>
    <x-slot name="title">Laporan Dosen dan Mata Kuliah</x-slot>
    
    <div class="space-y-6">
        <h2 class="text-3xl font-bold text-gray-800">Laporan Data Dosen dan Mata Kuliah</h2>

        <!-- Tabel Laporan -->
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <table class="min-w-full table-auto border-collapse w-full">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">NIDN</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nama Dosen</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($dosenMatkulData as $dosen)
                        @foreach ($dosen->mataKuliah as $matkul)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $dosen->nidn }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $dosen->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $dosen->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matkul->nama_mk }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matkul->sks }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matkul->semester }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
