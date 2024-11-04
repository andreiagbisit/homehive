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

            <div class="modal-footer" style="justify-content: center;">
                <form style="display: contents;" id="delete-entry-form" class="text-center" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger btn-user btn-block font-weight-bold col-sm-5"
                            style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;">
                        DELETE ENTRY
                    </button>
                </form>

                <button type="button"
                        data-dismiss="modal"
                        class="btn btn-secondary btn-user btn-block font-weight-bold col-sm-5"
                        style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;">
                    CANCEL
                </button>
            </div>
        </div>
    </div>
</div>
