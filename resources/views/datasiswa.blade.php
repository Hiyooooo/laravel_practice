<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <div class="text-white">
            <h1 class="text-2xl font-bold mb-5">Students List</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Birth Date</th>
                        <th class="px-4 py-2 text-left">Grade</th>
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $s)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $s['name'] }}</td>
                            <td class="px-4 py-2">{{ $s['email'] }}</td>
                            <td class="px-4 py-2">{{ $s['birthdate'] }}</td>
                            <td class="px-4 py-2">{{ $s['grade'] }}</td>
                            <td class="px-4 py-2">{{ $s['address'] }}</td>
                            <td class="px-4 py-2">{{ $s['phone'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>