<x-admin.layout title="Dashboard">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"></div>
        @endfor
    </div>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        @endfor
    </div>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>

    <div class="grid grid-cols-2 gap-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        @endfor
    </div>
</x-admin.layout>