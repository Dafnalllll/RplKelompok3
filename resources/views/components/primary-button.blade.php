<button {{ $attributes->merge(['type' => 'submit', 'class' => ' items-center rounded-full bg-gray-800 dark:bg-gray-200 border border-transparent  font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
