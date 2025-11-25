<div id="deleteGuardianModal-{{ $guardian->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-md px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Delete Guardian
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                               rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                               dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deleteGuardianModal-{{ $guardian->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-6">
                <p class="mb-4 text-sm text-gray-500 dark:text-gray-300">
                    Apakah kamu yakin ingin menghapus guardian
                    <span class="font-semibold">{{ $guardian->name }}</span>?
                    Aksi ini tidak bisa dibatalkan.
                </p>

                <form action="{{ route('guardian.delete', $guardian->id) }}" method="POST"
                    class="flex justify-end space-x-2">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="px-4 py-2 border rounded-md text-gray-700 dark:text-gray-200"
                        data-modal-hide="deleteGuardianModal-{{ $guardian->id }}">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>