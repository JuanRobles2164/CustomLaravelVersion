@switch($button_type)
    @case('create')
        <button type="submit" class="btn btn-primary">Crear</button>
        @break
    @case('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        @break
    @case('edit')
    <button type="submit" class="btn btn-warning">Editar</button>
        @break
    @default
@endswitch