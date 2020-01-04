
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
                      <h5>Add Crystal Information</h5>
                  </div>
                  <div class="ibox-content">
                    <form action="<?php echo site_url('Admin/insertCrystalInfo') ?>" method="post" enctype="multipart/form-data" id="crystal_form">
                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Crystal Name</label>

                          <div class="col-sm-10"><input type="text" name="crystal_name" id="crystal_name" class="form-control" placeholder="Crystal name"></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Crystal Image</label>

                          <div class="col-sm-10"><input type="file" name="img" id="img" class="form-control" /></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Chakra </label>
                          <div class="col-sm-10">
                            <select data-placeholder="Choose chakra" name="chakra[]" id="chakra" class="chosen-select" multiple style="width:350px;" tabindex="4">
                              <option value="">Select</option>

                              <?php foreach ($chakra as $chakra): ?>
                                <option value="<?php echo $chakra['chakra_name'] ?>"><?php echo $chakra['chakra_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Zodiac </label>
                          <div class="col-sm-10">
                            <select data-placeholder="Choose zodiac" name="zodiac[]" id="zodiac" class="chosen-select" multiple style="width:350px;" tabindex="4">
                              <option value="">Select</option>
                              <?php foreach ($zodiac as $zodiac): ?>
                                <option value="<?php echo $zodiac['zodic_name'] ?>"><?php echo $zodiac['zodic_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Potency</label>

                          <div class="col-sm-10"><input type="text" name="potency" id="potency" class="form-control" placeholder="Potency"></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Color </label>
                          <div class="col-sm-10">
                            <select data-placeholder="Choose color" name="color[]" id="color" class="chosen-select" multiple style="width:350px;" tabindex="4">
                              <option value="">Select</option>
                              <?php foreach ($color as $color): ?>
                                <option value="<?php echo $color['color_id'] ?>"><?php echo $color['color_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Vices </label>
                          <div class="col-sm-10">
                            <select data-placeholder="Choose vices" name="vices[]" id="vices" class="chosen-select" multiple style="width:350px;" tabindex="4">
                              <option value="">Select</option>
                              <?php foreach ($vices as $vices): ?>
                                <option value="<?php echo $vices['vices_name'] ?>"><?php echo $vices['vices_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Crystal Price</label>

                          <div class="col-sm-10"><input type="text" name="crystal_price" id="crystal_price" class="form-control" placeholder="Crystal Price"></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Revered For</label>

                          <div class="col-sm-10"><input type="text" name="revered_for" id="revered_for" class="form-control" placeholder="Revered For"></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Physical</label>

                          <div class="col-sm-10"><input type="text" name="physical" id="physical" class="form-control" placeholder="Physical"></div>
                      </div>
                      <div class="hr-line-dashed"></div>

                      <div class="form-group row"><label class="col-sm-2 col-form-label">Aspect of life </label>
                          <div class="col-sm-10">
                            <select data-placeholder="Choose aspect of life" name="aspect[]" id="aspect" class="chosen-select" multiple style="width:350px;" tabindex="4">
                              <option value="">Select</option>
                              <?php foreach ($aspect as $aspect): ?>
                                <option value="<?php echo $aspect['aspect_id'] ?>"><?php echo $aspect['aspect_name'] ?></option>
                              <?php endforeach; ?>
                            </select>
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
                        crystal_name : {required: true},
                        img : {required: true},
                        chakra : {required: true},
                        zodiac : {required: true},
                        potency : {required: true},
                        color : {required: true},
                        vices : {required: true},
                        crystal_price : {required: true},
                        revered_for : {required: true},
                        physical : {required: true},
                        aspect : {required: true},
                       },
                highlight: function (element)
                {
                  $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
                },
            messages: {
                        crystal_name :{ required: "Please enter crystal name"},
                        img :{ required: "Please provide image for crystal." },
                        chakra :{ required: "Please enter chakra." },
                        zodiac :{ required: "Please enter zodiac." },
                        potency :{ required: "Please enter potency." },
                        color :{ required: "Please enter color." },
                        vices :{ required: "Please enter vices." },
                        crystal_price :{ required: "Please enter crystal price." },
                        revered_for :{ required: "Please enter revered for." },
                        physical :{ required: "Please enter physical." },
                        aspect :{ required: "Please enter Aspect of life." },
                    },
        });
    });

    </script>

</body>
</html>
