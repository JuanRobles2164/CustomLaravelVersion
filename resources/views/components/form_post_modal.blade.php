<form action="{{ $action_route }}" method="POST">
    @csrf
    {{ $slot }}
</form>