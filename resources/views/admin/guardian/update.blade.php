<div id="editGuardianModal-{{ $guardian->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-lg px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Guardian
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                               rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                               dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editGuardianModal-{{ $guardian->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Body --}}
            <div class="p-6">
                <form action="{{ route('guardian.update', $guardian->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 sm:grid-cols-1">
                        <div>
                            <label for="guardian-name-{{ $guardian->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="guardian-name-{{ $guardian->id }}"
                                value="{{ old('name', $guardian->name) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="guardian-job-{{ $guardian->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job</label>
                            <input type="text" name="job" id="guardian-job-{{ $guardian->id }}"
                                value="{{ old('job', $guardian->job) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="guardian-phone-{{ $guardian->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="guardian-phone-{{ $guardian->id }}"
                                value="{{ old('phone', $guardian->phone) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="guardian-email-{{ $guardian->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="guardian-email-{{ $guardian->id }}"
                                value="{{ old('email', $guardian->email) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 border rounded-md text-gray-700 dark:text-gray-200"
                            data-modal-hide="editGuardianModal-{{ $guardian->id }}">
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