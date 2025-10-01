<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <div class="text-white">
            <h1 class="text-2xl font-bold mb-5">Classroom List</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Id</th>
                        <th class="px-4 py-2 text-left">Kelas</th>
                        <th class="px-4 py-2 text-left">Student List</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($classrooms as $c)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $c->id }}</td>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">{{ $c->name }}</td>
                            <td class="px-4 py-2">
                                @if($c->students->isEmpty())
                                    <span class="text-gray-400">Belum ada siswa</span>
                                @else
                                    <ul class="list-disc list-inside space-y-0.5">
                                        @foreach ($c->students as $s)
                                            <li class="whitespace-nowrap">{{ $s->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada data classroom.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>