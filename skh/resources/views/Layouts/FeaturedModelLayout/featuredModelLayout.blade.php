<div  class = "modal fade" id            = "featuredModal_{{ $id }}" tabindex = "-1" role      = "dialog" aria-labelledby = "featuredGamesModalLabel_{{ $id }}" aria-hidden = "true">
<div  class = "modal-dialog" role        = "document">
<div  class = "modal-content">
<form id    = "featuredGamesForm" action = "{{ $action }}" method             = "POST" enctype = "multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="featuredGamesModalLabel">Add Featured's</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div   class = "modal-body">
                <div   class = "form-group">
                <label for   = "featuredGameImage">Upload Image:</label>
                <input type  = "file" class = "form-control-file" id = "featuredGameImage" name = "{{ $inputName }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $submitButtonLabel }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
