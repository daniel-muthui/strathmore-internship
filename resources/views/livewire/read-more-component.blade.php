<div>
    @if ($showFullDescription)
        {{ $description }}
        <a wire:click="toggleDescription" class="read-more-link">Read less</a>
    @else
        {{ Str::limit($description, 100) }}
        <a wire:click="toggleDescription" class="read-more-link">Read more</a>
    @endif
</div>

<style>
    .read-more-link {
        color: #007bff;
        cursor: pointer;
    }
</style>

