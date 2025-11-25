<div id="editClassroomModal-{{ $classroom->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-lg px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Classroom
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                               rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                               dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editClassroomModal-{{ $classroom->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Body: form edit nama --}}
            <div class="p-6">
                <form action="{{ route('classroom.update', $classroom->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name-{{ $classroom->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Classroom Name
                        </label>
                        <input type="text" name="name" id="name-{{ $classroom->id }}"
                            value="{{ old('name', $classroom->name) }}"
                            class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 border rounded-md text-gray-700 dark:text-gray-200"
                            data-modal-hide="editClassroomModal-{{ $classroom->id }}">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>