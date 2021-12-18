<div class="modal fade" id="modal-{{ $modal_name }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ $form_action }}" method="{{ $form_method }}" id="form-{{ $modal_name }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('includes.input')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-function btn-function__exit" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn-function btn-function__save" id="btn-{{ $modal_name }}">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
