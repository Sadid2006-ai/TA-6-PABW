@props(['type' => 'success'])

<div {{ $attributes->merge(['class' => "alert alert-$type"]) }} role="alert">
    <span>{{ $type === 'success' ? '✓' : '!' }}</span>
    <div>{{ $slot }}</div>
</div>