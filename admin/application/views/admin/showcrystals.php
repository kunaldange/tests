  <style>
    .footable-row-detail-name {
      min-width: 100px !important;
    }
  </style>
  <div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
      <div class="col-lg-12">
        <div class="ibox ">
          <div class="ibox-title">
            <h5>Crystals Information</h5>
          </div>
          <div class="ibox-content">
            <table class="footable table table-stripped toggle-arrow-tiny">
              <thead>

                <tr>

                  <th data-toggle="true">Crystal Name</th>
                  <th>Crystal Image</th>
                  <th>Chakra</th>
                  <th>Zodiac</th>
                  <th>Potency</th>
                  <th>Color</th>
                  <th data-hide="all">Vices</th>
                  <th data-hide="all">Crystal Price</th>
                  <th data-hide="all">Revered For</th>
                  <th data-hide="all">Physical</th>
                  <th data-hide="all">Aspect of Life</th>
                  <th>Action</th>
                </tr>

              </thead>
              <tbody>
                <?php foreach ($crystal as $crystal ): ?>
                    <?php $clr = implode(",",$crystal['color']); ?>
                    <?php $aspect = implode(",",$crystal['aspect_of_life']); ?>
                  <tr>
                    <td><?php echo $crystal['cname'];  ?></td>
                    <td><img src="<?php echo $this->config->item('img_path').$crystal['cimg'];  ?>" width="100px" height="100px"></td>
                    <td><?php echo $crystal['chakra'];  ?></td>
                    <td><?php echo $crystal['zodiac'];  ?></td>
                    <td><?php echo $crystal['potency'];  ?></td>
                    <td><?php echo $clr;  ?></td>
                    <td><?php echo $crystal['vices'];  ?></td>
                    <td><?php echo $crystal['crystal_price'];  ?></td>
                    <td><?php echo $crystal['revered_for'];  ?></td>
                    <td><?php echo $crystal['physical'];  ?></td>
                    <td><?php echo $aspect;  ?></td>
                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
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

  <!-- Mainly scripts -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- FooTable -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/footable/footable.all.min.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>


  <!-- Page-Level Scripts -->
  <script>
      $(document).ready(function() {

          $('.footable').footable();
          $('.footable2').footable();

      });

  </script>

</body>
</html>
