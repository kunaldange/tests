
        <div class="wrapper wrapper-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="ibox ">
                <div class="ibox-title">
                  <h5>Customers Table</h5>
                </div>
                <div class="ibox-content">
                  <table class="footable table table-stripped toggle-arrow-tiny">
                    <thead>
                      <tr>

                        <th data-toggle="true">Customer Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Registered At</th>
                        <!-- <th>Action</th> -->

                      </tr>

                    </thead>
                    <tbody>
                      <?php foreach ($customer as $customer ): ?>
                          <?php $date = date("Y-m-d",strtotime($customer['user_created_at'])); ?>

                        <tr>
                          <td><?php echo $customer['user_full_name'];  ?></td>
                          <?php if(!empty($customer['user_image'])){ ?>
                          <td><img src="<?php echo $this->config->item('img_path').$customer['user_image'];  ?>" width="100px" height="100px"></td>
                          <?php }else{ ?>
                            <td>No Image Found</td>
                          <?php } ?>
                          <td><?php echo $customer['user_email_id'];  ?></td>
                          <td><?php echo $customer['user_gender'];  ?></td>
                          <td><?php echo $customer['user_mobile_no'];  ?></td>
                          <td><?php echo $date;  ?></td>
                          <!-- <td><?php echo "";  ?></td> -->

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <ul class="pagination float-right"></ul>
                        </td>
                      </tr>
                    </tfoot>
                  </table>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="footer">
          <div class="float-right">
            10GB of <strong>250GB</strong> Free.
          </div>
          <div>
              <strong>Copyright</strong> Example Company &copy; 2014-2018
          </div>
        </div>
  <!-- Header div ends here -->
      </div>
    </div>
  <!-- Header div ends here -->


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

    <!-- FooTable -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>
</html>
