<!-- Bulletin Entry Add Modal -->
<div class="modal fade" id="bulletinEntryModalAdd" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000; padding: 20px;">
            <div class="modal-header">
                <h6 class="modal-title" id="bulletinEntryModalLabel" style="font-weight: bold;">Bulletin Board - Add Entry</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContentArea">
                    <div class="col mb-4">
                        <h1 id="modalBulletinTitle" class="mt-1">Add Bulletin Board Entry</h1>

                        <p class="mb-4" style="color: #000;">
                            Please fill in the necessary details provided with the following fields below to publish an entry in the bulletin board. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                        </p>
                    </div>

                    <div class="col-lg-3 mb-4">
                        <h4 id="form-header-h4">
                            Entry Date <span style="color: red;">*</span>
                        </h4>
                        <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="date" name="new_password" class="form-control form-control-user" required>
                    </div>

                    <div class="col-lg-8 mb-4">
                        <h4 id="form-header-h4">
                            Title <span style="color: red;">*</span>
                        </h4>
                        <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="text" class="form-control form-control-user" required>
                    </div>

                    <div class="col-lg-8 mb-4">
                        <h4 id="form-header-h4">
                            Category <span style="color: red;">*</span>
                        </h4>

                        <div class="form-group form-check">
                            <input style="margin-top: 10px;" type="radio" class="form-check-input" name="bulletinCategoryPick" id="bulletinCategoryPick1">
                            <label id="checkbox-label" class="form-check-label mb-2">
                                <span id="chart-category" class="rounded-label bg-danger text-white">
                                    Announcement
                                </span>
                            </label>
                            <br>

                            <input style="margin-top: 10px;" type="radio" class="form-check-input" name="bulletinCategoryPick" id="bulletinCategoryPick2">
                            <label id="checkbox-label" class="form-check-label mb-2">
                                <span id="chart-category" class="rounded-label bg-success">
                                    Reminder
                                </span>
                            </label><br>

                            <input style="margin-top: 10px;" type="radio" class="form-check-input" name="bulletinCategoryPick" id="bulletinCategoryPick3">
                            <label id="checkbox-label" class="form-check-label mb-2">
                                <span id="chart-category" class="rounded-label bg-primary text-white">
                                    Event
                                </span>
                            </label><br>

                            <input style="margin-top: 10px;" type="radio" class="form-check-input" name="bulletinCategoryPick" id="bulletinCategoryPick4">
                            <label id="checkbox-label" class="form-check-label mb-2">
                                <span id="chart-category" class="rounded-label bg-warning">
                                    Interruption
                                </span>
                            </label><br>
                        </div>
                    </div>

                    <h4 id="form-header-h4" class="pl-2">
                        Entry Image
                    </h4>

                    <div class="form-group text-center pl-2">
                        <img id="modalImage" src="{{ url('img/plaza.jpg') }}"><br><br>
                        <span id="media-upload-info">
                            <i class="fas fa-image pr-2"></i> plaza.jpg | 410 KB
                        </span><br><br>
                        <p id="page-desc">
                            * The image must at least be <b>858x453</b>. In smartphone-based layouts, it will be displayed at <b>245x350</b>.<br>
                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                        </p>

                        <input id="input-file" type="file" accept=".jpg, .png">
                        <label class="btn btn-warning btn-icon-split" for="input-file">
                            <span class="icon text-white-50">
                                    <i class="fas fa-file-upload"></i>
                            </span>
                            
                            <span class="text" style="color: #000; font-weight: 500;">
                                Upload Image
                            </span>
                        </label><br>

                        <a href="#" class="btn btn-danger btn-icon-split" style="margin-bottom: 2%;">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span class="text" style="color: #fff; font-weight: 500;">Remove Existing Image</span>
                        </a>
                    </div>

                    <div class="col-lg-20 mb-3 pl-2">
                        <h4 id="form-header-h4">
                            Entry Details <span style="color: red;">*</span>
                        <h4>
                        <textarea id="richtexteditor" name="content" required></textarea>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var editor = new RichTextEditor("#richtexteditor");
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button id="bulletinEntryModalEdit" style="font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-5" type="button">ADD ENTRY</button>
                <button style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-5" type="button" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script>
    var currentUserAccountTypeId = {{ Auth::check() ? Auth::User()->account_type_id : 'null' }};

    $('#bulletinEntryModal').on('hidden.bs.modal', function () {
        $('.modal-backdrop').remove();
    });
</script>
