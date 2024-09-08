<!-- Bulletin Entry Modal -->
<div class="modal fade" id="bulletinEntryModal" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000; padding: 20px;">
            <div class="modal-header">
                <h6 class="modal-title" id="bulletinEntryModalLabel" style="font-weight: bold;">Bulletin Board - Entry Details</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContentArea">
                    <h1 id="modalEventTitle"></h1>
                    <div class="info-container">
                        <!-- Category Box -->
                        <div class="info-box-category" id="modalCategoryBox">
                            <i class="fas fa-tags icon-box-category"></i> 
                            <span><strong>Category</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                            <span id="modalCategory"></span>
                        </div>

                        <!-- Published Box -->
                        <div class="info-box">
                            <i class="fas fa-paper-plane icon-box"></i> 
                            <span><strong>Published</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                            <span id="modalDateAndTimePublished"></span>
                        </div>

                        <!-- Author Box -->
                        <div class="info-box">
                            <i class="fas fa-user-edit icon-box"></i> 
                            <span><strong>Author</strong> <span id="icon-box-divider">|</span></span>&nbsp;
                            <span id="modalAuthor"></span>
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div id="modalImageContainer" style="display: none; margin-top: 20px;">
                        <img id="modalImage" src="" alt="Event Image" class="img-fluid">
                    </div><br>

                    <!-- Event description -->
                    <div id="modalDescriptionArea">
                        <p id="modalDescription"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button id="bulletinEntryModalEdit" style="font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-3" type="button">EDIT ENTRY</button>
                <a href="#" id="bulletinEntryModalDelete" style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-danger btn-user btn-block font-weight-bold text-white col-sm-3" data-toggle="modal" data-target="#deleteEntryModal">DELETE ENTRY</a>
                <button style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-3" type="button" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script>
    var currentUserAccountTypeId = {{ Auth::check() ? Auth::User()->account_type_id : 'null' }};

    $('#bulletinEntryModal').on('hidden.bs.modal', function () {
        $('.modal-backdrop').remove(); // Remove backdrop after closing modal
    });
</script>
