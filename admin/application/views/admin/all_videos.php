  <style media="screen">
    video{height: 200px !important;}
  </style>
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
                      <h3>Uploaded Videos</h3>
                  </div>
                  <div class="ibox-content">
                    <div class="row" style="margin-bottom:50px">
                      <div class="col-md-12">
                        <h4>Youtube Videos</h4>
                      </div>

                      <?php foreach ($youtube as $key): ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                          <span> <?php echo $key['youtube_title']; ?></span><br>
                          <iframe width="100%" height="150" src="<?php echo $key['youtube_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      <?php endforeach; ?>

                      <?php //echo "<pre>"; print_r($youtube); ?>
                    </div>



                    <div class="row">
                      <div class="col-md-12">
                        <h4>Custom Videos</h4>
                      </div>
                      <?php foreach ($custom as $video): ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                          <span> <?php echo $video['video_title']; ?></span><br>
                          <video width="100%" controls class="img-responsive">
                            <source src="<?php echo base_url().$video['video_path'] ?>">
                            </video>
                          </div>

                        <?php endforeach; ?>

                      <?php //echo "<pre>"; print_r($custom); ?>

                    </div>
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
                        video_url:{required: true},
                       },
                highlight: function (element)
                {
                  $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
                },
            messages: {
                        video_name:{ required: "Please enter video name"},
                        video_url:{ required: "Please enter video link." },
                    },
        });
    });

    </script>

</body>
</html>
