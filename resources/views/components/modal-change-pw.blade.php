<!-- Change Password Modal-->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Change Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-6 mb-3">
                    <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Current Password <span style="color: red;">*</span></p>
                    <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="password" class="form-control form-control-user" required>
                </div>

                <div class="col-sm-6 mb-3">
                    <p style="color: #000; font-weight: 500; margin-bottom: 2%;">New Password <span style="color: red;">*</span></p>
                    <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="password" class="form-control form-control-user" required>
                </div>

                <div class="col-sm-6">
                    <p style="color: #000; font-weight: 500; margin-bottom: 2%;">Repeat New Password <span style="color: red;">*</span></p>
                    <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="password" class="form-control form-control-user" required>
                </div>
            </div>

            <div class="modal-footer d-inline">
                <div class="form-group mb-3">
                    <a style="color:#000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold" href="#" style="color: #000; font-weight: bold;">Apply New Password</a>
                </div>

                <div class="form-group">
                    <button style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white" type="button" data-dismiss="modal" style="font-weight: bold;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
