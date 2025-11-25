<form action="{{ route('datasiswa.store') }}" method="POST" class="space-y-4">
    @csrf

    <div class="grid gap-4 sm:grid-cols-1">

        {{-- Name --}}
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name
            </label>
            <input type="text" name="name" id="name" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Classroom --}}
        <div>
            <label for="classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Classroom
            </label>
            <select id="classroom_id" name="classroom_id" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                <option value="">-- Select Classroom --</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Birth Date --}}
        <div>
            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Birth Date
            </label>
            <input type="date" name="birthdate" id="birthdate" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Grade (manual) --}}
        <div>
            <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Grade
            </label>
            <input type="text" name="grade" id="grade" required placeholder="contoh: 11 PPLG 1"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Phone --}}
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Phone
            </label>
            <input type="text" name="phone" id="phone" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Address --}}
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Address
            </label>
            <input type="text" name="address" id="address" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
            Save
        </button>
    </div>
</form>