<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2">
            <li>
                <x-admin.side-link href="{{ route('dashboard') }}">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span>Dashboard</span>
                </x-admin.side-link>
            </li>

            <li>
                <x-admin.side-link href="{{ url('/admin/datasiswa') }}">
                    <span class="ml-0">Students</span>
                </x-admin.side-link>
            </li>
            <li>
                <x-admin.side-link href="{{ url('/admin/classroom') }}">
                    <span class="ml-0">Classroom</span>
                </x-admin.side-link>
            </li>
            <li>
                <x-admin.side-link href="{{ url('/admin/guardian') }}">
                    <span class="ml-0">Guardians</span>
                </x-admin.side-link>
            </li>
            <li>
                <x-admin.side-link href="{{ url('/admin/teacher') }}">
                    <span class="ml-0">Teachers</span>
                </x-admin.side-link>
            </li>
            <li>
                <x-admin.side-link href="{{ url('/admin/subjects') }}">
                    <span class="ml-0">Subjects</span>
                </x-admin.side-link>
            </li>
        </ul>
    </div>
</aside>