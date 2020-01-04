<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($page_title)){ echo $page_title;}?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet"> -->
  </head>

  <body>
    <?php if(!empty($this->session->ch_user) || !empty($this->session->admin) ){ ?>
      <a href="<?php echo site_url('User/logout'); ?>" class="login">Logout</a>
    <?php } ?>

  
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <?php

                if($this->session->flashdata('message')!="")
                {
                    ?>
                    <div class="alert <?php echo $this->session->flashdata('erclass'); ?>" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php
                }
              ?>

          </div>
        </div>
          <div class="text-center">
            <div class="tabs-container">
              <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Login</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Register</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active">
                  <div class="panel-body">

                    <h3 class="text-center">Login</h3>
                    <form method="post" action="<?= site_url('Login/authenticate') ?>" id="login_form">
                      <div class="form-group">
                        <label>Email Id</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Id">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <a href="#" data-toggle="modal" data-target="#forgotModal">Forgot Password?</a>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-block">LOGIN</button>
                      </div>

                    </form>
                  </div>
                </div>
                <div role="tabpanel" id="tab-2" class="tab-pane">
                  <div class="panel-body">
                    <h3>CREATE AN ACCOUNT</h3>
                    <h4>REGISTER NOW TO GET STARTED.</h4>
                    <form method="post" action="<?php echo site_url('Login/register'); ?>" id="register_form">
                      
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name *">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email *">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Select Gender</label>
                            <select class="form-control" name="gender" id="gender">
                              <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password *">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password *">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="image_name" id="image_name" class="form-control" placeholder="Please select image file">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" class="btn">REGISTER</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

    <script>
    $(document).ready(function () {
        $("#register_form").validate({

                rules: {
                        name:{required: true},
                        email:{required: true,email:true},
                        gender:{required: true},
                        mobile:{required: true},
                        password:{required: true},
                        confirmpassword:{required: true},
                        image_name:{required: true},
                      },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                        name:{required: "Please Enter Password"},
                        email:{required: "Please enter email id.",
                                email:"Please enter valid email format"},
                        gender:{required: "Please Enter Password"},
                        mobile:{required: "Please Enter Password"},
                        password:{required: "Please Enter Password"},
                        confirmpassword:{required: "Please Enter Password"},
                        image_name:{ required: "Please Enter Password"},
                      },
        });
    });

    </script>

    <script>
    $(document).ready(function () {
        $("#login_form").validate({

                rules: {
                        email:{required: true,email:true},
                        password:{required: true},
                      },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                        password:{required: "Please Enter Password"},
                        email:{
                                required: "Please enter Username.",
                                email:"Please enter valid username"
                            },
                      },
        });
    });

    </script>
  </body>
  </html>
