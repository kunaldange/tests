
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
                      <h5>Add Youtube Link</h5>
                  </div>
                  <div class="ibox-content">
                    <form action="<?php echo site_url('Admin/insertYoutubeLink') ?>" method="post" id="video_form">
                      <div class="form-group  row"><label class="col-sm-2 col-form-label">Video Name</label>

                          <div class="col-sm-10"><input type="text" name="video_name" id="video_name" class="form-control" placeholder="Video name"></div>
                      </div>
                      <div class="hr-line-dashed"></div>
                      <div class="form-group row"><label class="col-sm-2 col-form-label">Video Url</label>
                          <div class="col-sm-10"><input type="text" name="video_url" id="video_url" class="form-control" placeholder="Paste your link here"> <span class="form-text m-b-none">Paste your video URl here.</span>
                            <span class="form-text m-b-none">Ensure the URL contains /embed rather /watch.</span>
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

      <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
          

            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Uploaded Youtube Videos</h5>

                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Youtube Link</th>
                                <th>Function</th>

                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($youtube as $aspect): ?>
                                <tr id="<?php echo $aspect['youtube_id']; ?>">
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $aspect['youtube_title']; ?></td>
                                  <td><?php echo $aspect['youtube_link']; ?></td>
                                  <td>
                                    <button class="btn btn-xs edit_class" data-toggle="modal" data-id="<?php echo $aspect['youtube_id']; ?>" data-name="<?php echo $aspect['youtube_title']; ?>" data-url="<?php echo $aspect['youtube_link']; ?>" data-target="#myModal">Edit</button>
                                    <button class="btn btn-xs btn-danger remove">Delete</button>
                                    <!-- <a href="#" class="btn btn-xs btn-danger">Delete</a> -->
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


      <!-- FOOTER START -->
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


  <!-- ******************* EDIT MODAL WINDOW START************************* -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">EDIT DETAILS </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/edit_youtube_details') ?>" class="form-horizontal" method="post">
              <div class="form-group">
                <label class="col-sm-4">Title</label>
                <div class="col-sm-8">
                  <input type="hidden" name="youtube_id" id="edit_id" class="form-control">
                  <input type="text" name="youtube_title" id="edit_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4">Video URL </label>
                <div class="col-sm-8">

                  <input type="text" name="youtube_link" id="edit_url" class="form-control">
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

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        // on clik trash icon
      $('.edit_class').click(function(){
        //get cover id
        var id=$(this).data('id');
        var name=$(this).data('name');
        var url=$(this).data('url');

        //set href for cancel button
        $('#edit_id').val(id);
        $('#edit_name').val(name);
        $('#edit_url').val(url);

      })
    </script>

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

      <script type="text/javascript">

        $(".remove").click(function(){
            var id = $(this).parents("tr").attr("id");

           swal({
            title: "Are you sure?",
            text: "You will not be able to recover this aspect of life!",
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
                 url: '<?php echo site_url('Admin/delete_youtube_video/'); ?>'+id,
                 type: 'DELETE',
                 error: function() {
                    alert('Something is wrong');
                 },
                 success: function(data) {
                      $("#"+id).remove();
                      swal("Deleted!", "Aspect of life has been deleted.", "success");
                 }
              });
            } else {
              swal("Cancelled", "Aspect of life is safe :)", "error");
            }
          });

        });

      </script>

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
