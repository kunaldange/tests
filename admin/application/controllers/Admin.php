<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*    Author : KD	 */

class Admin extends CI_Controller {

   function __construct(){
    parent::__construct();
    //initialise the autoload things for this class
    $this->load->model('Adminmodel');
  }

  public function index()
	{
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }
    $data['num_users'] = $this->Adminmodel->getUsers();
    
    $this->load->view('admin/header.php');
		$this->load->view('admin/dash',$data);
	}

  public function profile()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }
    $this->load->view('admin/header.php');
    $this->load->view('admin/profile');
  }

  public function custom_video()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }
    $this->load->view('admin/header.php');
    $this->load->view('admin/custom_video');
  }

  public function upload_custom_video()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(isset($_FILES['video_file']['name'])!="")
    {
      $config['upload_path']   = '../video_upload/';
      $config['allowed_types'] = '*';

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $img_nm = "";

      if($this->upload->do_upload('video_file'))
      {
        $data = array('upload_data' => $this->upload->data());
        $img_nm = "../video_upload/".$this->upload->data('file_name');
      }
      else
      {
        $error = array('error' => $this->upload->display_errors());
      }

        $arr = array(
        "video_title" => $this->input->post('video_name'),
        "video_path" => $img_nm,
        "video_thumbnail" => "upload/abalone.jpg",
        "created_at" => date("Y-m-d H:i:s"),
        );

        $tbl = "custom_video";
        $result = $this->Adminmodel->insert_function($tbl,$arr);
          if($result > 0)
          {
            $this->session->set_flashdata('message', 'Video added successfully.');
            $this->session->set_flashdata('erclass', "alert-success");
            redirect('Admin/custom_video');
          }
          else
          {
            $this->session->set_flashdata('message', 'Problem occur while saving video.');
            $this->session->set_flashdata('erclass', "alert-danger");
            redirect('Admin/custom_video');
          }
      }
  }

  public function addYoutube()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }
    $data['youtube'] = $this->Adminmodel->getYoutubeVideos();
    $this->load->view('admin/header.php');
    $this->load->view('admin/youtube',$data);
  }

  public function insertYoutubeLink()
  {
    if(!empty($this->input->post('video_name')))
    {
      $vid_name = trim($this->input->post('video_name'));
      $vid_url = trim($this->input->post('video_url'));
      $vid = array(
              "youtube_title" => $vid_name,
              "youtube_link" => $vid_url
              );
      $vid_upload = $this->Adminmodel->insertYoutube($vid);
      if($vid_upload > 0)
      {
        $this->session->set_flashdata('success', "Success");
        redirect('Admin/addYoutube');
      }
      else
      {
        $this->session->set_flashdata('error', "Error");
        redirect('Admin/addYoutube');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please add the below details.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/addYoutube');
    }

  }

  public function delete_youtube_video()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $aspect_id = $this->uri->segment(3,0);
    $delete = $this->db->delete("youtube_video", array("youtube_id"=>$aspect_id));

    if($delete > 0)
    {
      $this->session->set_flashdata('message', 'Youtube video deleted successfully.');
      $this->session->set_flashdata('erclass', "alert-success");
      redirect('Admin/addYoutube');
    }
    else
    {
      $this->session->set_flashdata('message', 'Error occur while deleting video.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/addYoutube');
    }
  }

  public function edit_youtube_details()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('youtube_title')) && !empty($this->input->post('youtube_link')))
    {
      $you_id   = $this->input->post('youtube_id');
      $you_name = $this->input->post('youtube_title');
      $you_link = $this->input->post('youtube_link');
      $arr = array("youtube_title" => $you_name , "youtube_link" => $you_link);
      $con = array("youtube_id" => $you_id);
      $tbl = "youtube_video";

      $update = $this->Adminmodel->update_function($arr,$con,$tbl);

      if($update > 0)
      {
        $this->session->set_flashdata('message', 'Youtube video details edited successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/addYoutube');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while updating video details.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/addYoutube');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please provide video title and video URL.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/addYoutube');
    }
  }

  public function show_all_crystal()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $cry_info = $this->Adminmodel->allCrystals();
    // echo "<pre>";
    // print_r($cry_info); die;

    $list = array();
    foreach ($cry_info as $cry_info)
    {
      $colors = explode(",",$cry_info['color']);
      $aspect = explode(",",$cry_info['aspect_of_life']);
      $color_arr = array();
      $aspect_arr = array();
      foreach ($colors as $colors)
      {
        $color_arr[] = $this->db->select('color_name')->from('tbl_color')->where("color_id",$colors)->get()->row_array()['color_name'];
      }

      foreach ($aspect as $aspect )
      {
        $aspect_arr[] = $this->db->select('aspect_name')->from('aspect_of_life')->where("aspect_id",$aspect)->get()->row_array()['aspect_name'];
      }

      $cry_info['color'] = $color_arr;
      $cry_info['aspect_of_life'] = $aspect_arr;
      $list[] = $cry_info;
    }

    $data['crystal'] = $list;
    $this->load->view('admin/header.php');
    $this->load->view('admin/showcrystals', $data);
  }

  public function add_crystal()
  {
    $data['vices'] = $this->Adminmodel->getvices();
    $data['chakra'] = $this->Adminmodel->getchakra();
    $data['zodiac'] = $this->Adminmodel->getzodiac();
    $data['color'] = $this->Adminmodel->getcolor();
    $data['aspect'] = $this->Adminmodel->getaspect();

    $this->load->view('admin/header.php');
    $this->load->view('admin/addCrystal',$data);
  }

  public function insertCrystalInfo()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $img_path = $this->config->item('img_path');

    if(!empty($_POST))
    {
      $crystal_name  = $this->input->post('crystal_name');
      $chakra        = $this->input->post('chakra');
      $zodiac        = $this->input->post('zodiac');
      $potency       = $this->input->post('potency');
      $color         = $this->input->post('color');
      $vices         = $this->input->post('vices');
      $crystal_price = $this->input->post('crystal_price');
      $revered_for   = $this->input->post('revered_for');
      $physical      = $this->input->post('physical');
      $aspect        = $this->input->post('aspect');

      if(!empty($chakra))
      {
        $imp_chakra = implode(",",$chakra);
      }
      else
      {
        $imp_chakra = "";
      }

      if(!empty($zodiac))
      {
        $imp_zodiac = implode(",",$zodiac);
      }
      else
      {
        $imp_zodiac = "";
      }

      if(!empty($color))
      {
        $imp_color  = implode(",",$color);
      }
      else
      {
        $imp_color = "";
      }

      if(!empty($vices))
      {
        $imp_vices  = implode(",",$vices);
      }
      else
      {
        $imp_vices = "";
      }

      if(!empty($aspect))
      {
        $imp_aspect = implode(",",$aspect);
      }
      else
      {
        $imp_aspect = "";
      }

      if (isset( $_FILES['img']['name'])!="")
      {
        // $tmpFile = $_FILES['img']['tmp_name'];
        // $this->resize_image($tmpFile, 300, 300);

        $config['upload_path']   = '../upload/';
        $config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|jpeg|JPEG';

        $this->load->library('upload', $config);
        $img = "";
        if ( $this->upload->do_upload('img'))
          {
              $data = array('upload_data' => $this->upload->data());
              $img = "upload/".$this->upload->data('file_name');
          }
      }
      $tbl_name = "tbl_crystal";
      $ins = array(
              "cname"          => $crystal_name,
              "cimg"           => $img,
              "chakra"         => $imp_chakra,
              "zodiac"         => $imp_zodiac,
              "potency"        => $potency,
              "vices"          => $imp_vices,
              "color"          => $imp_color,
              "crystal_price"  => $crystal_price,
              "revered_for"    => $revered_for,
              "physical"       => $physical,
              "aspect_of_life" => $imp_aspect,
              "updated_dt"     => date("Y-m-d H:i:s"),
              );

      $insert_data = $this->Adminmodel->insert_function($tbl_name,$ins);
      if($insert_data > 0)
      {
        $this->session->set_flashdata('message', 'Crystal information added successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/add_crystal');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while saving crystal information.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/add_crystal');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please fill the below details.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/add_crystal');
    }

  }

  function resize_image($file, $width, $height) {
    list($w, $h) = getimagesize($file);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* read binary data from image file */
    $imgString = file_get_contents($file);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
    imagejpeg($tmp, $file, 100);
    return $file;
    /* cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
  }

  public function allCustomers()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $data['customer'] = $this->Adminmodel->allCustomers();
    $this->load->view('admin/header.php');
    $this->load->view('admin/all_customers',$data);
  }



  public function showColors()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $data['color'] = $this->Adminmodel->getcolor();
    $this->load->view('admin/header.php');
    $this->load->view('admin/show_colors',$data);
  }

  public function delete_color()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $color_id = $this->uri->segment(3,0);
    $delete = $this->db->delete("tbl_color",array("color_id"=>$color_id));

    if($delete > 0)
    {
      $this->session->set_flashdata('message', 'Color deleted successfully.');
      $this->session->set_flashdata('erclass', "alert-success");
      redirect('Admin/showColors');
    }
    else
    {
      $this->session->set_flashdata('message', 'Error occur while deleting color.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showColors');
    }
  }

  public function add_color_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('new_color_name')))
    {
      $color_name = $this->input->post('new_color_name');
      $insert = array("color_name" => $color_name);
      $tbl_name = "tbl_color";
      $insert_data = $this->Adminmodel->insert_function($tbl_name,$insert);
      if($insert_data > 0)
      {
        $this->session->set_flashdata('message', 'New color added successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showColors');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while saving color.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showColors');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Color cannot be empty while adding new color.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showColors');
    }

  }

  public function edit_color_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('color_name')))
    {
      $color_id   = $this->input->post('color_id');
      $color_name = $this->input->post('color_name');
      $arr = array("color_name" => $color_name);
      $con = array("color_id" => $color_id);
      $tbl = "tbl_color";

      $update = $this->Adminmodel->update_function($arr,$con,$tbl);

      if($update > 0)
      {
        $this->session->set_flashdata('message', 'Color edited successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showColors');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while updating color.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showColors');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please fill the color name.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showColors');
    }

  }

  public function showVices()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $data['vices'] = $this->Adminmodel->getvices();
    $this->load->view('admin/header.php');
    $this->load->view('admin/show_vices',$data);
  }

  public function delete_vices()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $color_id = $this->uri->segment(3,0);
    $delete = $this->db->delete("vices",array("vices_id"=>$color_id));

    if($delete > 0)
    {
      $this->session->set_flashdata('message', 'Vice deleted successfully.');
      $this->session->set_flashdata('erclass', "alert-success");
      redirect('Admin/showVices');
    }
    else
    {
      $this->session->set_flashdata('message', 'Error occur while deleting vice.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showVices');
    }
  }

  public function add_vices_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('new_vices_name')))
    {
      $vice_name = $this->input->post('new_vices_name');
      $insert = array("vices_name" => $vice_name);
      $tbl_name = "vices";
      $insert_data = $this->Adminmodel->insert_function($tbl_name,$insert);
      if($insert_data > 0)
      {
        $this->session->set_flashdata('message', 'New vice added successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showVices');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while saving vice.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showVices');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Vice cannot be empty while adding new vice.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showVices');
    }

  }

  public function edit_vice_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('vices_name')))
    {
      $vice_id   = $this->input->post('vices_id');
      $vice_name = $this->input->post('vices_name');
      $arr = array("vices_name" => $vice_name);
      $con = array("vices_id" => $vice_id);
      $tbl = "vices";

      $update = $this->Adminmodel->update_function($arr,$con,$tbl);

      if($update > 0)
      {
        $this->session->set_flashdata('message', 'Vice edited successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showVices');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while updating vices.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showVices');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please fill the vice name.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showVices');
    }
  }

  public function showChakra()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $data['chakra'] = $this->Adminmodel->getchakra();
    $this->load->view('admin/header.php');
    $this->load->view('admin/show_chakra',$data);
  }

  public function delete_chakra()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    $chakra_id = $this->uri->segment(3,0);
    $delete = $this->db->delete("chakra", array("chakra_id"=>$chakra_id));

    if($delete > 0)
    {
      $this->session->set_flashdata('message', 'Chakra deleted successfully.');
      $this->session->set_flashdata('erclass', "alert-success");
      redirect('Admin/showChakra');
    }
    else
    {
      $this->session->set_flashdata('message', 'Error occur while deleting chakra.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showChakra');
    }
  }

  public function add_chakra_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('new_chakra_name')))
    {
      $chakra_name = $this->input->post('new_chakra_name');
      $insert = array("chakra_name" => $chakra_name);
      $tbl_name = "chakra";
      $insert_data = $this->Adminmodel->insert_function($tbl_name,$insert);
      if($insert_data > 0)
      {
        $this->session->set_flashdata('message', 'New chakra added successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showChakra');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while saving chakra.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showChakra');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Chakra cannot be empty while adding new chakra.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showChakra');
    }

  }

  public function edit_chakra_name()
  {
    if(!isset($this->session->admin_session))
    {
      redirect("login");
    }

    if(!empty($this->input->post('chakra_name')))
    {
      $chakra_id   = $this->input->post('chakra_id');
      $chakra_name = $this->input->post('chakra_name');
      $arr = array("chakra_name" => $chakra_name);
      $con = array("chakra_id" => $chakra_id);
      $tbl = "chakra";

      $update = $this->Adminmodel->update_function($arr,$con,$tbl);

      if($update > 0)
      {
        $this->session->set_flashdata('message', 'Chakra edited successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showChakra');
      }
      else
      {
        $this->session->set_flashdata('message', 'Problem occur while updating chakra.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showChakra');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Please provide the chakra name.');
      $this->session->set_flashdata('erclass', "alert-danger");
      redirect('Admin/showChakra');
    }
  }


    public function showAspect()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      $data['aspect'] = $this->Adminmodel->getaspect();
      $this->load->view('admin/header.php');
      $this->load->view('admin/show_aspect',$data);
    }

    public function delete_aspect()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      $aspect_id = $this->uri->segment(3,0);
      $delete = $this->db->delete("aspect_of_life", array("aspect_id"=>$aspect_id));

      if($delete > 0)
      {
        $this->session->set_flashdata('message', 'Aspect deleted successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showAspect');
      }
      else
      {
        $this->session->set_flashdata('message', 'Error occur while deleting aspect.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showAspect');
      }
    }

    public function add_aspect_of_life()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      if(!empty($this->input->post('new_aspect')))
      {
        $aspect_name = $this->input->post('new_aspect');
        $insert = array("aspect_name" => $aspect_name);
        $tbl_name = "aspect_of_life";
        $insert_data = $this->Adminmodel->insert_function($tbl_name,$insert);
        if($insert_data > 0)
        {
          $this->session->set_flashdata('message', 'New aspect of life added successfully.');
          $this->session->set_flashdata('erclass', "alert-success");
          redirect('Admin/showAspect');
        }
        else
        {
          $this->session->set_flashdata('message', 'Problem occur while saving aspect of life.');
          $this->session->set_flashdata('erclass', "alert-danger");
          redirect('Admin/showAspect');
        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Aspect of life cannot be blank while adding new aspect.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showAspect');
      }

    }

    public function edit_aspect_name()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      if(!empty($this->input->post('aspect_name')))
      {
        $aspect_id   = $this->input->post('aspect_id');
        $aspect_name = $this->input->post('aspect_name');
        $arr = array("aspect_name" => $aspect_name);
        $con = array("aspect_id" => $aspect_id);
        $tbl = "aspect_of_life";

        $update = $this->Adminmodel->update_function($arr,$con,$tbl);

        if($update > 0)
        {
          $this->session->set_flashdata('message', 'Aspect of life edited successfully.');
          $this->session->set_flashdata('erclass', "alert-success");
          redirect('Admin/showAspect');
        }
        else
        {
          $this->session->set_flashdata('message', 'Problem occur while updating aspect of life.');
          $this->session->set_flashdata('erclass', "alert-danger");
          redirect('Admin/showAspect');
        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Please provide the aspect name.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showAspect');
      }
    }

    public function add_zodiac_date()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      if(!empty($this->input->post('date_range')))
      {
        $zodiac_id   = $this->input->post('zodiac_id');
        $date_range = $this->input->post('date_range');
        $insert = array(
            "zodiac_id"  => $zodiac_id,
            "date_range" => $date_range,
            "created_at" => date("Y-m-d H:i:s")
            );
        $tbl_name = "date_ranges";

        $update = $this->Adminmodel->insert_function($tbl_name,$insert);

        if($update > 0)
        {
          $this->session->set_flashdata('message', 'Date range added successfully.');
          $this->session->set_flashdata('erclass', "alert-success");
          redirect('Admin/showZodiac');
        }
        else
        {
          $this->session->set_flashdata('message', 'Problem occur while adding date.');
          $this->session->set_flashdata('erclass', "alert-danger");
          redirect('Admin/showZodiac');
        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Please provide the date range.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showZodiac');
      }
    }

    public function delete_date_range()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      $aspect_id = $this->uri->segment(3,0);
      $delete = $this->db->delete("date_ranges", array("id"=>$aspect_id));

      if($delete > 0)
      {
        $this->session->set_flashdata('message', 'Date range deleted successfully.');
        $this->session->set_flashdata('erclass', "alert-success");
        redirect('Admin/showZodiac');
      }
      else
      {
        $this->session->set_flashdata('message', 'Error occur while deleting date range.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showZodiac');
      }
    }

    public function edit_date_range()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }

      if(!empty($this->input->post('date_name')))
      {
        $date_id   = $this->input->post('date_id');
        $date_name = $this->input->post('date_name');
        $arr = array("date_range" => $date_name);
        $con = array("id" => $date_id);
        $tbl = "date_ranges";

        $update = $this->Adminmodel->update_function($arr,$con,$tbl);

        if($update > 0)
        {
          $this->session->set_flashdata('message', 'Date range edited successfully.');
          $this->session->set_flashdata('erclass', "alert-success");
          redirect('Admin/showZodiac');
        }
        else
        {
          $this->session->set_flashdata('message', 'Problem occur while updating date range.');
          $this->session->set_flashdata('erclass', "alert-danger");
          redirect('Admin/showZodiac');
        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Please provide the date range.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/showZodiac');
      }
    }

    public function showZodiac()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }
      $data['zodiac'] = $this->Adminmodel->getzodiac();
      $data['dates'] = $this->Adminmodel->getzodiac_dates();
      // echo "<pre>";print_r($data['zodiac']); die;
      $this->load->view('admin/header.php');
      $this->load->view('admin/show_zodiac',$data);
    }

    public function show_video()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }
      $data['custom'] = $this->Adminmodel->getCustomVideos();
      $data['youtube'] = $this->Adminmodel->getYoutubeVideos();
      // echo "<pre>";print_r($data['zodiac']); die;
      $this->load->view('admin/header.php');
      $this->load->view('admin/all_videos',$data);
    }

    public function change_password()
    {
      if(!isset($this->session->admin_session))
      {
        redirect("login");
      }
      $this->load->view('admin/header.php');
      $this->load->view('admin/change_pass');
    }

    public function change_pass()
    {
      // print_r($this->input->post()); die;
      $arr = array("id" => $this->input->post('admin_id'), "password" => base64_encode($this->input->post('old_pass')));
      $tbl_name = "admin_tbl";
      $cnt = $this->Adminmodel->get_count($tbl_name,$arr);
      if($cnt > 0)
      {
        $arr = array(
          "password" => base64_encode($this->input->post('new_pass')),
          "updated_dt" => date("Y-m-d H:i:s")
        );
        $cond = array("id" => $this->input->post('admin_id'));
        $result = $this->Adminmodel->update_function($arr, $cond,$tbl_name);
        if($result)
        {
          $this->session->set_flashdata('message', 'Password changed successfully.');
          $this->session->set_flashdata('erclass', "alert-success");
          redirect('Admin');
        }
        else
        {
          $this->session->set_flashdata('message', 'Sorry, problem occur while updating password.');
          $this->session->set_flashdata('erclass', "alert-danger");
          redirect('Admin/change_password');

        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Sorry, old password did not matched.');
        $this->session->set_flashdata('erclass', "alert-danger");
        redirect('Admin/change_password');
      }
    }

    // public function orders()
    // {
    //   if(!isset($this->session->admin_session))
    //   {
    //     redirect("login");
    //   }
    //
    //   $orders = $this->Adminmodel->getOrdersInfo();
    //   $cust = array();
    //   foreach ($orders as $key)
    //   {
    //     $key[''];
    //   }
    //
    //   echo "<pre>";
    //   print_r($orders);
    // }

    public function logout()
  	{
  		$this->session->unset_userdata('admin_session');
      $this->session->set_flashdata('log_message', 'You logout successfully.');
      $this->session->set_flashdata('logout', "Logout");
  		redirect("Login");
	  }

}
?>
