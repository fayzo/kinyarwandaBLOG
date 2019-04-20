<!-- MODAL OF ADD PAGES IN CREATE CONTENT -->
    <!-- ADD PADES -->
    <div class="modal fade" id="addpages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pages title">Pages Title</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Authors">Authors</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Pages Body">Pages Body</label>
                        <textarea class="form-control" name="editor1" id="" rows="4"></textarea>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                            Publish
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="Meta Description">Meta Tags</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Meta Description">Meta Description</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF ADD PADES -->
    <!-- EDIT OF MODAL OF USERS PADES -->
    <?php require('edit_modal.php'); ?>

    <!-- EDIT OF MODAL OF USERS PADES -->

    <!-- END OF MODAL OF ADD PAGES IN CREATE CONTENT -->
    <!-- FOOTER COPYRIGHT YEAR  -->
    <footer id="footer" class="main-active">
        <p> Copyright AdminStrap, <i class="fa fa-copyright" aria-hidden="true"></i> copy 2019 </p>
    </footer>
    <!-- FOOTER COPYRIGHT YEAR  -->
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/jquery.dataTables.min.js"></script>

    <!-- DATATABLE  jQuery UI integration for Responsive -->
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/jquery_ui.js"></script> -->
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/dataTables.jqueryui.min.js"></script> -->
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/dataTables.responsive.min.js"></script> -->
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/responsive.jqueryui.min.js"></script> -->
    <!-- DATATABLE  jQuery UI integration for Responsive -->

    <script src="<?php echo BASE_URL_LINK ;?>dist/js/popper.js"></script>

    <!-- DATATABLE Bootstrap 4 integration for Responsive -->
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/bootstrap4.min.js"></script>
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/responsive.bootstrap4.min.js"></script> -->
    <!-- DATATABLE Bootstrap 4 integration for Responsive -->

    <script src="<?php echo BASE_URL_LINK ;?>dist/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/js/dataTables.bootstrap.min.js"></script> -->
    <script src="<?php echo BASE_URL_LINK ;?>js/users_CRUD_table_fecth.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>js/dashboard_profile.js"></script>

    <!-- <script src="<?php echo BASE_URL_LINK ;?>lang/language_rw.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>lang/language_en.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>lang/language_fr.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>lang/language_stmt.js"></script> -->
    <!-- <script>
    CKEDITOR.replace('editor1');
</script> -->
</body>
</html>