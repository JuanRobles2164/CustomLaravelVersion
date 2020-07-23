<form action="{{ $attributes }}" method="POST">
    @csrf
    {{ $slot }}
    <x-form_button_create/>
</form>