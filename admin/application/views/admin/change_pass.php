<!-- <div class="wrapper wrapper-content"> -->
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
                <h5>Change Password</h5>
            </div>
            <div class="ibox-content">
              <form action="<?php echo site_url('Admin/change_pass') ?>" method="post" enctype="multipart/form-data" id="crystal_form">
                <input type="hidden" name="admin_id" value="<?= $this->session->admin_session['id'] ?>">
                <div class="form-group  row"><label class="col-sm-2 col-form-label">Old Password</label>

                    <div class="col-sm-10"><input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Old Password"></div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">New Password</label>

                    <div class="col-sm-10"><input type="password" name="new_pass" id="new_pass" class="form-control" /></div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">Confirm Password</label>

                    <div class="col-sm-10"><input type="password" name="cnf_pass" id="cnf_pass" class="form-control" /></div>
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
<!-- </div> -->
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

<!-- Chosen -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

<script>

$('.chosen-select').chosen({width: "100%"});

$(document).ready(function () {
  $("#crystal_form").validate({

          rules: {
                  old_pass : {required: true},
                  new_pass : {minlength : 6,required: true},
                  cnf_pass: {required: true, equalTo:"#new_pass" },
                },
          highlight: function (element)
          {
            $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
          },
      messages: {
                  old_pass :{ required: "Please enter old password"},
                  new_pass :{ minlength : "Password must contain minimum 6 characters",required: "Please enter new password" },
                  cnf_pass :{ required: "Please enter new password to confirm.",equalTo: "Password did not match."},


              },
  });
});

</script>

</body>
</html>
