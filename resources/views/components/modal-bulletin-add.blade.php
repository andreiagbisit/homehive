@props(['categories'])

<!-- Bulletin ADD ENTRY MODAL -->
<div class="modal fade" id="bulletinEntryModalAdd" tabindex="-1" role="dialog" aria-labelledby="bulletinEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('bulletin.board.store.entry.admin') }}" method="POST" class="user"> <!-- Ensure route is set for saving the data -->
            @csrf <!-- Add CSRF token for security -->
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
                                Please fill in the necessary details provided below. Fields marked with <span style="color: red; font-weight: 500;">*</span> are mandatory.
                            </p>
                        </div>

                        <!-- Entry Date -->
                        <div class="col-lg-3 mb-4">
                            <h4 id="form-header-h4">Event Date <span style="color: red;">*</span></h4>
                            <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="date" name="post_date" class="form-control form-control-user" required>
                        </div>

                        <!-- Title -->
                        <div class="col-lg-8 mb-4">
                            <h4 id="form-header-h4">Title <span style="color: red;">*</span></h4>
                            <input style="border-radius: 10rem; padding: 1.5rem 1rem;" type="text" name="title" class="form-control form-control-user" required>
                        </div>

                        <!-- Category -->
                        <div class="col-lg-8 mb-4">
                            <h4 id="form-header-h4">Category<span style="color: red;">*</span></h4>
                            <div class="form-group form-check">
                                @foreach ($categories as $category) <!-- Dynamically loop through categories -->
                                    <input style="margin-top: 10px;" type="radio" class="form-check-input" name="category_id" value="{{ $category->id }}" required>
                                    <label id="checkbox-label" class="form-check-label mb-2">
                                        <span id="chart-category" class="rounded-label" style="background-color: {{ $category->hex_code }}; color: #fff;">
                                            {{ $category->name }}
                                        </span>
                                    </label><br>
                                @endforeach
                            </div>
                        </div>

                        <!-- Entry Details -->
                        <div class="col-lg-20 mb-3 pl-2">
                            <h4 id="form-header-h4">Entry Details <span style="color: red;">*</span></h4>
                            <textarea id="richtexteditor" name="description" class="form-control" required></textarea>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var editor = new RichTextEditor("#richtexteditor");
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="submit" style="font-size: 16px; font-weight: bold; color: #000; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-warning btn-user btn-block font-weight-bold col-sm-5">ADD ENTRY</button>
                    <button style="font-size: 16px; font-weight: bold; border-radius: 35rem; padding: .75rem .1rem; line-height: 1.5;" class="btn btn-secondary btn-user btn-block font-weight-bold text-white col-sm-5" type="button" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>
