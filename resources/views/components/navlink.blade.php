@props(['active' => false])

<a
    {{ $attributes->merge([
        ' class' => $active
            ? 'flex items-center p-2 text-gray-900 bg-gray-100 dark:text-white dark:bg-gray-600 group rounded-lg'
            : 'flex items-center p-2 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 group rounded-lg',
    ]) }}>
    {{ $slot }}
</a>
