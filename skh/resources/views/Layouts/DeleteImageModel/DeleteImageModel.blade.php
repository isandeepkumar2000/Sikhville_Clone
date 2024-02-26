<!-- Delete Image Modal -->
<div class="modal fade" id="deleteImageModal_{{ $itemId }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel_{{ $itemId }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteImageModalLabel_{{ $itemId }}">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the image?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ $deleteRoute }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
