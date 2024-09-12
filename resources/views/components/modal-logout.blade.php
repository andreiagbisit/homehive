<!-- Log Out Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: #000;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Log Out</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure? This will end your current session in the website.</div>

            <div class="modal-footer d-inline">
                <div class="form-group mb-3">
                    <a style="color:#000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold" href="{{ url('login') }}" style="color: #000; font-weight: bold;">Log Out</a>
                </div>

                <div class="form-group">
                    <button style="border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white" type="button" data-dismiss="modal" style="font-weight: bold;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
