<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

                {{-- TOP BAR: SEARCH + ADD GUARDIAN --}}
                <div class="flex flex-col md:flex-row items-center justify-between
                            space-y-3 md:space-y-0 md:space-x-4 p-4">
                    {{-- Search --}}
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817
                                              4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input 
                                    type="text"
                                    id="simple-search"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                              focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2
                                              dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                              dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Search...">
                            </div>
                        </form>
                    </div>

                    {{-- Add Guardian button (modal) --}}
                    <div class="w-full md:w-auto flex justify-end">
                        <button type="button" data-modal-target="addGuardianModal" data-modal-toggle="addGuardianModal"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white 
                                       bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 
                                       dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 
                                       rounded-lg shadow">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110
                                         2h-5v5a1 1 0 11-2 0v-5H4a1 1 0
                                         110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Guardian
                        </button>
                    </div>
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50
                                      dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Job</th>
                                <th class="px-4 py-3 text-left">Phone</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guardians as $g)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3">
                                        {{ $guardians->firstItem() + $loop->index }}
                                    </td>
                                    <td class="px-4 py-3">{{ $g->name }}</td>
                                    <td class="px-4 py-3">{{ $g->job ?: '-' }}</td>
                                    <td class="px-4 py-3">{{ $g->phone ?: '-' }}</td>
                                    <td class="px-4 py-3">{{ $g->email }}</td>

                                    {{-- ACTION BUTTON --}}
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="guardian-actions-{{ $g->id }}-button"
                                            data-dropdown-toggle="guardian-actions-{{ $g->id }}" type="button" class="inline-flex items-center p-0.5 text-sm font-medium text-center
                                                           text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none
                                                           dark:text-gray-400 dark:hover:text-gray-100">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <div id="guardian-actions-{{ $g->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow
                                                        dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="guardian-actions-{{ $g->id }}-button">
                                                <li>
                                                    <button type="button" data-modal-target="editGuardianModal-{{ $g->id }}"
                                                        data-modal-toggle="editGuardianModal-{{ $g->id }}" class="w-full text-left block py-2 px-4 hover:bg-gray-100
                                                                       dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="deleteGuardianModal-{{ $g->id }}"
                                                        data-modal-toggle="deleteGuardianModal-{{ $g->id }}" class="w-full text-left block py-2 px-4 text-red-600 hover:bg-gray-100
                                                                       dark:text-red-400 dark:hover:bg-gray-600">
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- MODAL ADD GUARDIAN --}}
                <div id="addGuardianModal" tabindex="-1" aria-hidden="true"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
                    <div class="relative w-full max-w-lg px-4">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">

                            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Add Guardian
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                                               rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center
                                               dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="addGuardianModal">
                                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1l12 12M13 1L1 13" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-6">
                                @include('admin.guardian.create')
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL EDIT & DELETE PER GUARDIAN --}}
                @foreach ($guardians as $guardian)
                    @include('admin.guardian.update', ['guardian' => $guardian])
                    @include('admin.guardian.delete', ['guardian' => $guardian])
                @endforeach

                {{-- FOOTER --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center
                            space-y-3 md:space-y-0 p-4">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $guardians->firstItem() }}-{{ $guardians->lastItem() }}
                        </span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $guardians->total() }}
                        </span>
                        results
                    </span>

                    <div>
                        {{ $guardians->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-admin.layout>