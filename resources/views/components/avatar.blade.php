@props(['initials', 'avatarURL' => null, 'size' => 10])

<div>
    @if ($avatarURL)
        <img
            class="h-{{ $size }} w-{{ $size }} rounded-full"
            src="{{ $avatarURL }}"
            alt="{{ $name }}"
        >
    @else
        <span class="flex h-{{ $size }} w-{{ $size }} items-center justify-center rounded-full bg-neutral-400 text-black dark:bg-neutral-600 dark:text-white">
            {{ $initials }}
        </span>
    @endif
</div>
