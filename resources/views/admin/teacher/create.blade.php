<form action="{{ route('teacher.store') }}" method="POST" class="space-y-4">
    @csrf

    <div class="grid gap-4 sm:grid-cols-1">
        {{-- Teacher Name --}}
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Teacher Name
            </label>
            <input type="text" name="name" id="name" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        {{-- Subject (dropdown) --}}
        <div>
            <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Subject
            </label>
            <select id="subject_id" name="subject_id" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                <option value="">-- Select Subject --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">
                        {{ $subject->name }}
                    </option>
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