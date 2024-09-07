<!DOCTYPE html>
<html lang="en">

    {{ $head }}

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            {{ $sidebar_base }}

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    {{ $topbar }}

                    {{ $content }}

                </div>
                <!-- End of Main Content -->

                {{ $footer }}

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        {{ $scroll_to_top }}

        {{ $modal_logout }}

        {{ $modal_change_pw }}

        {{ $modal_delete_entry }}

        {{ $modal_bulletin_entry }}

        {{ $script }}

    </body>
</html>