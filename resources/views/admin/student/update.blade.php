<div id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-lg px-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Student
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                               rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                               dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editStudentModal-{{ $student->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Body: form edit --}}
            <div class="p-6">
                <form action="{{ route('datasiswa.update', $student->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 sm:grid-cols-1">
                        <div>
                            <label for="name-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name-{{ $student->id }}"
                                value="{{ old('name', $student->name) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="classroom-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classroom</label>
                            <select id="classroom-{{ $student->id }}" name="classroom_id"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                                <option value="">-- Select Classroom --</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}" {{ $classroom->id == $student->classroom_id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="email-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email-{{ $student->id }}"
                                value="{{ old('email', $student->email) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="birthdate-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                            <input type="date" name="birthdate" id="birthdate-{{ $student->id }}"
                                value="{{ old('birthdate', $student->birthdate) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="grade-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
                            <input type="text" name="grade" id="grade-{{ $student->id }}"
                                value="{{ old('grade', $student->grade) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="address-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" name="address" id="address-{{ $student->id }}"
                                value="{{ old('address', $student->address) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label for="phone-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="phone-{{ $student->id }}"
                                value="{{ old('phone', $student->phone) }}"
                                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" class="px-4 py-2 border rounded-md text-gray-700 dark:text-gray-200"
                            data-modal-hide="editStudentModal-{{ $student->id }}">
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