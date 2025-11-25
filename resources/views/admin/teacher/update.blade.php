<div id="editTeacherModal-{{ $teacher->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-lg px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Teacher
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                           rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                           dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editTeacherModal-{{ $teacher->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Body: form edit --}}
            <div class="p-6">
                <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 sm:grid-cols-1">
                        <div>
                            <label for="teacher-name-{{ $teacher->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Name
                            </label>
                            <input type="text" name="name" id="teacher-name-{{ $teacher->id }}"
                                value="{{ old('name', $teacher->name) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="teacher-subject-{{ $teacher->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Subject
                            </label>
                            <select id="teacher-subject-{{ $teacher->id }}" name="subject_id"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                                <option value="">-- Select Subject --</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $teacher->subject_id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="teacher-email-{{ $teacher->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email
                            </label>
                            <input type="email" name="email" id="teacher-email-{{ $teacher->id }}"
                                value="{{ old('email', $teacher->email) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="teacher-phone-{{ $teacher->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Phone
                            </label>
                            <input type="text" name="phone" id="teacher-phone-{{ $teacher->id }}"
                                value="{{ old('phone', $teacher->phone) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="teacher-address-{{ $teacher->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Address
                            </label>
                            <input type="text" name="address" id="teacher-address-{{ $teacher->id }}"
                                value="{{ old('address', $teacher->address) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 border rounded-md text-gray-700 dark:text-gray-200"
                            data-modal-hide="editTeacherModal-{{ $teacher->id }}">
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