<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <div class="text-white">
            <h1 class="text-2xl font-bold mb-5">Teacher</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Subject Name</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Address</th>
                    </tr>
                </thead>
                <tbody>
                <tbody class="text-gray-600">
                    @foreach ($teachers as $t)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $t->name }}</td>
                            <td class="px-4 py-2">{{ $t->subject->name }}</td>
                            <td class="px-4 py-2">{{ $t->phone }}</td>
                            <td class="px-4 py-2">{{ $t->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>