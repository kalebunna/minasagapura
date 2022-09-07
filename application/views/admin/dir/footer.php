 </div>
 <!--**********************************
            Content body end
        ***********************************-->


 <!--**********************************
            Footer start
        ***********************************-->
 <div class="footer">
        <div class="copyright">
               <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2021</p>
        </div>
 </div>
 <!--**********************************
            Footer end
        ***********************************-->

 <!--**********************************
           Support ticket button start
        ***********************************-->

 <!--**********************************
           Support ticket button end
        ***********************************-->



 </div>
 <!--**********************************
        Main wrapper end
    ***********************************-->

 <!--**********************************
        Scripts
    ***********************************-->
 <!-- Required vendors -->
 <script src="<?= base_url() ?>/assets/templates_admin/vendor/global/global.min.js"></script>
 <script src="<?= base_url() ?>/assets/templates_admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
 <script src="<?= base_url() ?>/assets/templates_admin/js/custom.min.js"></script>
 <script src="<?= base_url() ?>/assets/templates_admin/js/dlabnav-init.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script type="text/javascript">
        $(document).ready(function() {

               $('#summernote').summernote({
                      prettifyHtml: false,
                      toolbar: [
                             ['style', ['style']],
                             ['font', ['bold', 'underline', 'clear']],
                             ['fontname', ['fontname']],
                             ['fontsize', ['fontsize']],
                             ['color', ['color']],
                             ['para', ['ul', 'ol', 'paragraph']],
                             ['table', ['table']],
                             ['insert', ['link', 'picture', 'video']],
                             ['view', ['fullscreen', 'codeview']],
                             ['highlight', ['highlight']]
                      ],
                      callbacks: {
                             onImageUpload: function(image) {
                                    uploadImage(image[0]);
                             },
                             onMediaDelete: function(target) {
                                    deleteImage(target[0].src);
                             }
                      }
               });
               $('.dropdown-toggle').dropdown();
               $(document).click(function() {
                      $('.dropdown-toggle').removeClass('show');
               });

               function uploadImage(image) {
                      var data = new FormData();
                      data.append("image", image);
                      $.ajax({
                             url: "<?= site_url('admin/add/upload_image') ?>",
                             cache: false,
                             contentType: false,
                             processData: false,
                             data: data,
                             type: "POST",
                             success: function(url) {
                                    $('#summernote').summernote("insertImage", url);
                             },
                             error: function(data) {
                                    console.log(data);
                             }
                      });
               }

               function deleteImage(src) {
                      $.ajax({
                             data: {
                                    src: src
                             },
                             type: "POST",
                             url: "<?= base_url('admin/add/delete_image') ?>",
                             cache: false,
                             success: function(response) {
                                    console.log(response);
                             }
                      });
               }

        });
 </script>
 </body>

 </html>