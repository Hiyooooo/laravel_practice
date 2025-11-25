<form action="{{ route('classroom.store') }}" method="POST" class="space-y-4">
    @csrf

    <div class="grid gap-4 sm:grid-cols-1">
        {{-- Classroom Name --}}
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Classroom Name
            </label>
            <input type="text" name="name" id="name" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
            Save
        </button>
    </div>
</form>