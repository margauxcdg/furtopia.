@props(['notification'])

<a href="{{ $notifications->data['url'] }}" class="dropdown-item">
    {{ $notifications->data['message'] }}
</a>
