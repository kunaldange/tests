
      <div class="wrapper wrapper-content">
        <div class="row">
          <?php

            if($this->session->flashdata('message')!="")
            {
                ?>
                <div class="alert <?php echo $this->session->flashdata('erclass'); ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php
            }

        ?>
          <div class="col-lg-12">
              <div class="ibox ">
                  <div class="ibox-title">
                      <h5>Add Video</h5>
                  </div>
                  <div class="ibox-content">
                    <form action="<?php echo site_url('Admin/upload_custom_video') ?>" method="post" id="video_form" enctype="multipart/form-data">
                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Video Name</label>

                          <div class="col-sm-10"><input type="text" name="video_name" id="video_name" class="form-control" placeholder="Video name"></div>
                      </div>
                      <div class="hr-line-dashed"></div>
                      <div class="form-group row"><label class="col-sm-2 col-form-label">Video File</label>
                          <div class="col-sm-10"><input type="file" name="video_file" id="video_file" class="form-control" placeholder="Choose your file.."> <span class="form-text m-b-none">Upload video file here.</span>
                          </div>
                      </div>
                      <div class="hr-line-dashed"></div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-sm-offset-2">
                              <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                              <button class="btn btn-primary btn-sm" type="submit" name="Submit">Save changes</button>
                          </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="footer">
        <div class="float-right">
          <strong></strong>
        </div>
        <div>
            <strong>Copyright</strong> Best Website Designer &copy; 2019
        </div>
      </div>
  <!-- Header div ends here -->
      </div>
    </div>
  <!-- Header div ends here -->

  <!-- Sweet alert -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
  <?php if($this->session->flashdata('success') != ""){
  echo "<script>
        swal({
                title: 'Success',
                text: 'Video Added successfully!!',
                type: 'success',
                timer: 3000
            });

          </script>";
        } ?>
  <?php if($this->session->flashdata('error') != ""){
  echo "<script>
        swal({
                title: 'Error',
                text: 'Error while adding Video!!',
                type: 'warning',
                timer: 3000
            });

          </script>";
        } ?>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Validate Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

    <script>
    $(document).ready(function () {
        $("#video_form").validate({

                rules: {
                        video_name:{required: true},
                        video_file:{required: true},
                       },
                highlight: function (element)
                {
                  $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
                },
            messages: {
                        video_name:{ required: "Please enter video name"},
                        video_file:{ required: "Please enter video link." },
                    },
        });
    });

    </script>

</body>
</html>
