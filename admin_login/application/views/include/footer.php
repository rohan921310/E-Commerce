<footer class="footer text-center">
       All Rights Reserved by Gupta Watch House. Designed and Developed by <a href=""> Rohan Sharma.</a>
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="<?= base_url() ?>dist/js/app.min.js"></script>
<script src="<?= base_url() ?>dist/js/app.init.js"></script>
<script src="<?= base_url() ?>dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>dist/js/custom.min.js"></script>
<!--This page plugins -->
<script src="<?= base_url() ?>assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?= base_url() ?>dist/js/pages/datatable/datatable-basic.init.js"></script>

<script src="<?= base_url() ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url() ?>dist/js/pages/forms/select2/select2.init.js"></script>

    <script src="<?= base_url() ?>assets/extra-libs/prism/prism.js"></script>

    <script src="<?= base_url() ?>assets/libs/summernote/dist/summernote-bs4.min.js"></script>
    <script>
    /************************************/
    //default editor
    /************************************/
    $('.summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });

    /************************************/
    //inline-editor
    /************************************/
    $('.inline-editor').summernote({
        airMode: true
    });

    /************************************/
    //edit and save mode
    /************************************/
    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }

    var edit = function() {
        $('.click2edit').summernote({ focus: true });
    };

    var save = function() {
        var markup = $('.click2edit').summernote('code');
        $('.click2edit').summernote('destroy');
    };

    /************************************/
    //airmode editor
    /************************************/
    $('.airmode-summer').summernote({
        airMode: true
    });
    </script>

</body>

</html>