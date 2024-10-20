<!-- Dashboard Add Modal -->
<div class="modal fade" id="dashboardModalEdit" tabindex="-1" role="dialog" aria-labelledby="dashboardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000; padding: 20px;">
            <div class="modal-header">
                <h6 class="modal-title" id="bulletinEntryModalLabel" style="font-weight: bold;">Dashboard - Manage Properties</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContentArea">
                    <div class="col mb-4">
                        <h1 id="modalBulletinTitle" class="mt-1">Manage Dashboard</h1>

                        <p class="mb-4" style="color: #000;">
                            Please fill in the necessary details provided with the following fields below to determine the properties of the dashboard. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                        </p>
                    </div>
                    
                    <h5 id="page-desc">Subdivision Details</h5><hr><br>

                    <div class="col-lg-5 mb-4">
                        <h4 id="form-header-h4">
                            Name <span style="color: red;">*</span>
                        </h4>
                        <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="text" class="form-control form-control-user" required value="Lorem Ipsum Residences">
                    </div>

                    <h4 id="form-header-h4" class="pl-2">
                        Logo
                    </h4>

                    <div class="form-group text-center pl-2">
                        <img class="img-circle profile-avatar border border border-secondary rounded-circle mb-1"
                                style="border-radius: 50%; width: 232px; height: 232px; object-fit: cover;"
                                src="{{ url('img/subd-logo.png') }}" ><br><br>
                                
                                <span id="media-upload-info">
                                    <i class="fas fa-image pr-2"></i> subd-logo.png | 45 KB
                                </span><br><br>

                        <p id="page-desc">
                            * The image's resolution must at least be <b>232x232</b>.<br>
                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                        </p>

                        <!-- File input for profile picture -->
                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png" required>
                        <label class="btn btn-warning btn-icon-split" for="input-file">
                            <span class="icon text-white-50">
                                    <i class="fas fa-file-upload"></i>
                            </span>
                            
                            <span class="text" style="color: #000; font-weight: 500;">
                                Upload New Image
                            </span>
                        </label><br>

                        <a href="#" class="btn btn-danger btn-icon-split" style="margin-bottom: 2%;">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span class="text" style="color: #fff; font-weight: 500;">Remove Existing Image</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button id="saveChangesButton" style="font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-5" type="button">SAVE CHANGES</button>
                <button style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-5" type="button" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
