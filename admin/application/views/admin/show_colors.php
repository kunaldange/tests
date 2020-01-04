
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
                    <h5>Colors Table </h5>

                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addModal">Add Color</button>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Color Name</th>
                            <th>Function</th>

                        </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach ($color as $color): ?>
                            <tr id="<?php echo $color['color_id']; ?>">
                              <td><?php echo $i; ?></td>
                              <td><?php echo $color['color_name']; ?></td>
                              <td>
                                <button class="btn btn-xs edit_class" data-toggle="modal" data-id="<?php echo $color['color_id']; ?>" data-name="<?php echo $color['color_name']; ?>" data-target="#myModal">Edit</button>
                                <button class="btn btn-xs btn-danger remove">Delete</button>
                                <!-- <a href="#" class="btn btn-xs btn-danger remove">Delete</a> -->
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

  <!-- ******************* Add MODAL WINDOW START************************* -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">ADD COLOR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/add_color_name') ?>" class="form-horizontal" method="post">
              <div class="form-group">
                  <label class="col-sm-4">Color Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="new_color_name" class="form-control">
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
  <!-- ******************* Add MODAL WINDOW END************************* -->

  <!-- ******************* EDIT MODAL WINDOW START************************* -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">EDIT COLOR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/edit_color_name') ?>" class="form-horizontal" method="post">
              <div class="form-group">
                  <label class="col-sm-4">Color Name</label>
                  <div class="col-sm-8">
                      <input type="hidden" name="color_id" id="edit_id" class="form-control">
                      <input type="text" name="color_name" id="edit_name" class="form-control">
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
      $('#edit_name').val(name);
    })
  </script>
  <!-- Sweet alert -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">

    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");

       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this color!",
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
             url: '<?php echo site_url('Admin/delete_color/'); ?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Color has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Color is safe :)", "error");
        }
      });

    });

  </script>

  </body>
  </html>
