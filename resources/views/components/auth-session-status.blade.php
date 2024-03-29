@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'bg-green-300 font-medium text-lg text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
