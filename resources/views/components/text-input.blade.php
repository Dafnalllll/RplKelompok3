@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-200 border-gray-300 text-gray-700 focus:border-blue-400 focus:ring-blue-400 rounded-full shadow-sm']) }}>
