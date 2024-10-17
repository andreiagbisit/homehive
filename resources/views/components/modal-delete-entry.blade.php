<div class="modal fade" id="deleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Delete Entry</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to permanently delete this entry? This action cannot be undone.
            </div>

            <div class="modal-footer d-inline">
                <form id="delete-entry-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-user btn-block font-weight-bold">
                        Delete Entry
                    </button>
                </form>
                <div class="form-group">
                    <button class="btn btn-secondary btn-user btn-block font-weight-bold" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
