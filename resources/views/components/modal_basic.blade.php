<!-- Modal -->
<div class="modal fade" id="{{$modal_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$modal_title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <x-form_post_modal>
        <div class="modal-body">    
            {{$slot}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <x-button_form button_type="{{$modal_type}}"/>
        </div>
    </x-form_post_modal>
      </div>
    </div>
  </div>