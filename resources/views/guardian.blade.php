<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <div class="text-white">
            <h1 class="text-2xl font-bold mb-5">Guardians List</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Job</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guardians as $g)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $g->name }}</td>
                            <td class="px-4 py-2">{{ $g->job ?: '-' }}</td>
                            <td class="px-4 py-2">{{ $g->phone ?: '-' }}</td>
                            <td class="px-4 py-2">{{ $g->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>