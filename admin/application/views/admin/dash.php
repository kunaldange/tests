
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
  </div>
      <div class="wrapper wrapper-content">
        <div class="row">
          <div class="col-lg-3">
            <div class="ibox ">
              <div class="ibox-title">
                <span class="label label-success float-right">Monthly</span>
                <h5>Users</h5>
              </div>
              <a href="<?php echo site_url("Admin/allCustomers"); ?>">
                <div class="ibox-content">
                  <h1 class="no-margins"><?php echo $num_users; ?></h1>
                  <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                  <small>Total users</small>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="ibox ">
              <div class="ibox-title">
                <span class="label label-info float-right">Annual</span>
                <h5>Orders</h5>
              </div>
              <div class="ibox-content">
                <h1 class="no-margins"><?php echo $num_orders; ?></h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small>New orders</small>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="ibox ">
              <div class="ibox-title">
                <span class="label label-primary float-right">Today</span>
                <h5>Crystals</h5>
              </div>
              <a href="<?php echo site_url("Admin/show_all_crystal") ?>">
                <div class="ibox-content">
                  <h1 class="no-margins"><?php echo $num_crystals; ?></h1>
                  <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                  <small>Total Crystals</small>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="ibox ">
              <div class="ibox-title">
                <span class="label label-danger float-right">Low</span>
                <h5>User activity</h5>
              </div>
              <div class="ibox-content">
                <h1 class="no-margins">80,600</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>In first month</small>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
                <h5>Orders</h5>
                <div class="float-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-white active">Today</button>
                    <button type="button" class="btn btn-xs btn-white">Monthly</button>
                    <button type="button" class="btn btn-xs btn-white">Annual</button>
                  </div>
                </div>
              </div>
                <div class="ibox-content">
                    <div class="row">
                      <div class="col-lg-9">
                        <div class="flot-chart">
                          <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <ul class="stat-list">
                          <li>
                            <h2 class="no-margins">2,346</h2>
                            <small>Total orders in period</small>
                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                            <div class="progress progress-mini">
                              <div style="width: 48%;" class="progress-bar"></div>
                            </div>
                          </li>
                          <li>
                            <h2 class="no-margins ">4,422</h2>
                            <small>Orders in last month</small>
                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                            <div class="progress progress-mini">
                              <div style="width: 60%;" class="progress-bar"></div>
                            </div>
                          </li>
                          <li>
                            <h2 class="no-margins ">9,180</h2>
                            <small>Monthly income from orders</small>
                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                            <div class="progress progress-mini">
                              <div style="width: 22%;" class="progress-bar"></div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
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

</body>
</html>
