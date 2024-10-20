<!-- Dashboard Add Modal -->
<div class="modal fade" id="apptResModalManage" tabindex="-1" role="dialog" aria-labelledby="apptResModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000; padding: 20px;">
            <div class="modal-header">
                <h6 class="modal-title" id="bulletinEntryModalLabel" style="font-weight: bold;">Appointments & Reservations - Manage Properties</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContentArea">
                    <div class="col">
                        <h1 id="modalBulletinTitle" class="mt-1 mb-4">Manage Appointments & Reservation Interface</h1>

                        <p class="mb-4" style="color: #000;">
                            Please upload an image for each booking category to provide a visual overview of the facilities and services provided by the subdivision.
                        </p>

                        <p id="page-desc" class="text-center">
                            * The image's resolution must at least be <b>390x300</b>. In smartphone-based layouts, it will be displayed at <b>267x300</b>.<br>
                            <b>Supported file types:</b> <b class="text-danger">.jpg</b>, <b class="text-danger">.png</b><br>
                            <b>Maximum image size:</b> <b class="text-danger">20 MB</b>
                        </p><hr>
                    </div>
                    
                    <h5 id="page-desc" class="mt-5">'Super Admin' / 'Admin' Account Type</h5><hr><br>

                    <h4 id="form-header-h4" class="pl-2">
                        Image - Facilities
                    </h4>

                    <div class="form-group text-center pl-2">
                        <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/facilities.jpg') }}"><br><br>
                                
                                <span id="media-upload-info">
                                    <i class="fas fa-image pr-2"></i> facilities.jpg | 1,141 KB
                                </span><br><br>

                        <!-- File input for profile picture -->
                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
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
                    </div><br>
                    
                    <h4 id="form-header-h4" class="pl-2">
                        Image - Vehicle Sticker
                    </h4>

                    <div class="form-group text-center pl-2">
                        <img id="appt-and-res-img" class="img-fluid mt-3 mb-4" src="{{ url('img/stickers.jpg') }}"><br><br>
                                
                                <span id="media-upload-info">
                                    <i class="fas fa-image pr-2"></i> stickers.jpg | 100 KB
                                </span><br><br>

                        <!-- File input for profile picture -->
                        <input id="input-file" type="file" name="profile_picture" accept=".jpg, .png">
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
                    </div><br>

                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button id="saveChangesButton" style="font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-5" type="button">SAVE CHANGES</button>
                <button style="font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-5" type="button" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
