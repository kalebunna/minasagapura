 </div>
 </div>
 <!-- footer start-->
 <footer class="footer">
        <div class="container-fluid">
               <div class="row">
                      <div class="col-md-12 footer-copyright text-center">
                             <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap </p>
                      </div>
               </div>
        </div>
 </footer>
 </div>
 <!-- latest jquery-->
 <script src="<?= base_url() ?>assets/templates_admin/js/jquery-3.5.1.min.js"></script>
 <!-- Bootstrap js-->
 <script src="<?= base_url() ?>assets/templates_admin/js/bootstrap/bootstrap.bundle.min.js"></script>
 <!-- feather icon js-->
 <script src="<?= base_url() ?>assets/templates_admin/js/icons/feather-icon/feather.min.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/icons/feather-icon/feather-icon.js"></script>
 <!-- scrollbar js-->
 <script src="<?= base_url() ?>assets/templates_admin/js/scrollbar/simplebar.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/scrollbar/custom.js"></script>

 <!-- Sidebar jquery-->
 <script src="<?= base_url() ?>assets/templates_admin/js/config.js"></script>
 <!-- Plugins JS start-->
 <script src="<?= base_url() ?>assets/templates_admin/js/sidebar-menu.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/jquery.ui.min.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/editor/summernote/summernote.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/tooltip-init.js"></script>


 <!-- Plugins JS Ends-->
 <!-- Theme js-->
 <script src="<?= base_url() ?>assets/templates_admin/js/script.js"></script>
 <script src="<?= base_url() ?>assets/templates_admin/js/theme-customizer/customizer.js"></script>
 <!-- login js-->
 <!-- Plugin used-->
 </body>

 </html>
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