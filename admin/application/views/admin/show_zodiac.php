
  <div class="wrapper wrapper-content animated fadeInRight">

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
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Zodiac Table </h5>
                    <?php // print_r($zodiac); die; ?>
                    <!-- <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addModal">Add Aspect of life</button> -->
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Zodiac Name</th>
                            <th>Image</th>
                            <th>Date Range</th>
                            <th>Function</th>

                        </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach ($zodiac as $zodiac): ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $zodiac['zodic_name']; ?></td>
                              <td><img width="100px" height="100px" src="<?php echo $this->config->item('img_path').$zodiac['zodic_image'] ?>"/></td>
                              <td><?php foreach ($dates as $key): if($key['zodiac_id'] == $zodiac['zodic_id']){?>
                                <p id="<?php echo $key['id']; ?>"><?php echo $key['date_range']; ?>
                                  <button class="btn btn-xs btn-warning edit_date" data-toggle="modal" data-id="<?php echo $key['id']; ?>" data-name="<?php echo $key['date_range']; ?>" data-target="#addModal"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-xs btn-danger remove"><i class="fa fa-trash"></i></button>
                                </p>
                              <?php } endforeach; ?></td>
                               <td><button class="btn btn-xs btn-primary edit_class" data-toggle="modal" data-id="<?php echo $zodiac['zodic_id']; ?>" data-name="<?php echo $zodiac['zodic_name']; ?>" data-target="#myModal">Add Date</button>

                                 <!--<a href="#" class="btn btn-xs btn-danger">Delete</a>-->
                              </td>

                            </tr>

                          <?php $i++; endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

  </div>

  <!-- ******************* Edit MODAL WINDOW START************************* -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">EDIT Date Range</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/edit_date_range'); ?>" class="form-horizontal" method="post">
              <div class="form-group">
                  <label class="col-sm-4">Date Range </label>
                  <div class="col-sm-8">
                    <input type="hidden" name="date_id" id="date_id" class="form-control">
                    <input type="text" name="date_name" id="date_name" class="form-control">
                  </div>

              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ******************* Edit MODAL WINDOW END************************* -->

  <!-- ******************* Add MODAL WINDOW START************************* -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add <span id="edit_name"></span> Date</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/add_zodiac_date'); ?>" class="form-horizontal" method="post">
              <div class="form-group">
                  <label class="col-sm-4">Add Date </label>
                  <div class="col-sm-8">
                      <input type="hidden" name="zodiac_id" id="edit_id" class="form-control">
                      <input type="text" name="date_range" class="form-control">
                  </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ******************* EDIT MODAL WINDOW END************************* -->

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

  <script>
      // on clik trash icon
    $('.edit_class').click(function(){
      //get cover id
      var id=$(this).data('id');
      var name=$(this).data('name');
      //set href for cancel button
      $('#edit_id').val(id);
      $('#edit_name').text(name);
    })

    $('.edit_date').click(function(){
      //get cover id
      var id=$(this).data('id');
      var datename=$(this).data('name');
      //set href for cancel button
      $('#date_id').val(id);
      $('#date_name').val(datename);
    })
  </script>

  <!-- Sweet alert -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">

    $(".remove").click(function(){
        var id = $(this).parent("p").attr("id");
        // alert(id);
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this date!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo site_url('Admin/delete_date_range/'); ?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Date has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Date range is safe :)", "error");
        }
      });

    });

  </script>

  </body>
  </html>
