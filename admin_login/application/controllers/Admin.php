<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);

		if ($this->session->userdata('admin_username')) {
		} else {
			$this->session->set_flashdata('msg', 'Please Login First');
			$this->session->set_flashdata('msg_class', 'bg-danger text-white');
			redirect(base_url());
		}
	}

	//...................basic info ................//
	function basic_info()
	{
		$data['fetch_basic_info'] = $this->Admin_model->fetch_basic_info();
		$data['fetch_member'] = $this->Admin_model->fetch_member();
 		$this->load->view('include/header');
		$this->load->view('basic_info', $data);
		$this->load->view('include/footer');
	}

	function basic_info_check()
	{
		$this->Admin_model->basic_info_update();

		$this->session->set_flashdata('msg', 'Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/basic_info');
	}

	function about_us_page()
	{
		$this->Admin_model->about_us_page();
		
		$this->session->set_flashdata('msg', 'About Us Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/basic_info');
	}

	function contact_us_page()
	{
		$this->Admin_model->contact_us_page();

		$this->session->set_flashdata('msg', 'Contact Us Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/basic_info');
	}

	function update_privacy()
	{
		$this->Admin_model->update_privacy();

		$this->session->set_flashdata('msg', 'Privacy Page Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/basic_info');
	}

	function update_terms()
	{
		$this->Admin_model->update_terms();

		$this->session->set_flashdata('msg', 'Terms Of Use Page Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/basic_info');
	}

	//...................front page ................//
	
	function front_page()
	{
		$data['fetch_main_banner'] = $this->Admin_model->fetch_main_banner();

		$this->load->view('include/header');
		$this->load->view('front_page', $data);
		$this->load->view('include/footer');
	}

	function main_banner()
	{
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png|pdf';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('main_banner1')) {
			$data =  $this->upload->data();
			$main_banner1 = $data['raw_name'] . $data['file_ext'];
			$post['main_banner1'] = $main_banner1;
		}

		if ($this->upload->do_upload('main_banner2')) {
			$data =  $this->upload->data();
			$main_banner2 = $data['raw_name'] . $data['file_ext'];
			$post['main_banner2'] = $main_banner2;
		}

		if ($this->upload->do_upload('main_banner3')) {
			$data =  $this->upload->data();
			$main_banner3 = $data['raw_name'] . $data['file_ext'];
			$post['main_banner3'] = $main_banner3;
		}

		$this->Admin_model->main_banner($main_banner2, $main_banner3, $main_banner1);
		$this->session->set_flashdata('msg', 'Main Banner Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/front_page');
	}

	function mini_banner()
	{
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png|pdf';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('mini_banner1')) {
			$data =  $this->upload->data();
			$mini_banner1 = $data['raw_name'] . $data['file_ext'];
			$post['mini_banner1'] = $mini_banner1;
		}

		if ($this->upload->do_upload('mini_banner2')) {
			$data =  $this->upload->data();
			$mini_banner2 = $data['raw_name'] . $data['file_ext'];
			$post['mini_banner2'] = $mini_banner2;
		}

		if ($this->upload->do_upload('mini_banner3')) {
			$data =  $this->upload->data();
			$mini_banner3 = $data['raw_name'] . $data['file_ext'];
			$post['mini_banner3'] = $mini_banner3;
		}

		$this->Admin_model->mini_banner($mini_banner1, $mini_banner2, $mini_banner3);
		$this->session->set_flashdata('msg', 'Mini Banner Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/front_page');
	}

	
	//...................category ................//

	function add_category()
	{
		$data['fetch_category'] = $this->Admin_model->category();

		$this->load->view('include/header');
		$this->load->view('add_category', $data);
		$this->load->view('include/footer');
	}

	function category_check()
	{
		$this->Admin_model->category_check();

		$this->session->set_flashdata('msg', 'Successfully Added');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/add_category');
	}

	function delete_category()
	{
		$this->Admin_model->delete_category();
		$this->session->set_flashdata('msg', 'Successfully Deleted');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/add_category');
	}


	//...................sub category ................//
	function add_sub_category()
	{
		$data['fetch_category'] = $this->Admin_model->category();
		$data['fetch_sub_category'] = $this->Admin_model->sub_category();

		$this->load->view('include/header');
		$this->load->view('add_sub_category', $data);
		$this->load->view('include/footer');
	}

	function sub_category_check()
	{
		$this->Admin_model->sub_category_check();

		$this->session->set_flashdata('msg', 'Successfully Added');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/add_sub_category');
	}

	function delete_sub_category()
	{
		$this->Admin_model->delete_sub_category();
		$this->session->set_flashdata('msg', 'Successfully Deleted');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/add_sub_category');
	}

	//...................add_addvertisement ................//
	function add_advertisement()
	{
		$data['fetch_category'] = $this->Admin_model->category();

		$this->load->view('include/header');
		$this->load->view('add_advertisement', $data);
		$this->load->view('include/footer');
	}

	public function fetch_sub_category()
	{
		echo json_encode($this->Admin_model->fetch_sub_category());
	}

	function check_advertisement()
	{
		extract($this->input->post());
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('front_image')) {
			$this->session->set_flashdata('msg', 'Error');
			$this->session->set_flashdata('msg_class', 'bg-danger text-white');
			redirect(base_url() . 'index.php/add_advertisement');
		} else {
			$data =  $this->upload->data();

			$config['image_library'] = 'GD2';
			$config['source_image'] = './uploads/' . $data['raw_name'] . $data['file_ext'];
			$config['width']         = 272;
			$config['height']       = 228;
			// $config['maintain_ratio'] = TRUE;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$image = $data['raw_name'] . $data['file_ext'];
			$last_id = $this->Admin_model->add_advertisement($image);

			$filesCount = count($_FILES['all_images']['name']);

			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['all_images']['name'][$i];
				$_FILES['file']['type']     = $_FILES['all_images']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['all_images']['tmp_name'][$i];
				$_FILES['file']['error']     = $_FILES['all_images']['error'][$i];
				$_FILES['file']['size']     = $_FILES['all_images']['size'][$i];

				$config['upload_path']          = 'uploads/';
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['max_size']             = 200000;
				
				// Load and initialize upload library 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					// Uploaded file data 
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $fileData['file_name'];
					$this->Admin_model->add_all_image($uploadData[$i]['file_name'], $last_id);
				}
			}
			$this->session->set_flashdata('msg', 'Upload successfull');
			$this->session->set_flashdata('msg_class', 'bg-success text-white');
			redirect(base_url() . 'index.php/add_advertisement');
		}
	}


	//...................view advertisement ................//
	function view_advertisement()
	{
		$data['fetch_advertisement'] = $this->Admin_model->view_advertisement();

		$this->load->view('include/header');
		$this->load->view('view_advertisement', $data);
		$this->load->view('include/footer');
	}

	function delete_advertisement()
	{
		$this->Admin_model->delete_advertisement();
		$this->session->set_flashdata('msg', 'Successfully Deleted');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/view_advertisement');
	}

	function get_advertisement()
	{
		$data['fetch_advertisement'] = $this->Admin_model->get_advertisement();
		$data['fetch_category'] = $this->Admin_model->category();

		$this->load->view('include/header');
		$this->load->view('edit_advertisement', $data);
		$this->load->view('include/footer');
	}

	function edit_advertisement()
	{
		$this->Admin_model->edit_advertisement();

		$this->session->set_flashdata('msg', 'Successfully Updated');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/view_advertisement');
	}
	//...................update main image of advertisement ................//

	function get_advertisement_main_image()
	{
		$data['fetch_advertisement'] = $this->Admin_model->get_advertisement_front_image();

		$this->load->view('include/header');
		$this->load->view('edit_advertisement_main_image', $data);
		$this->load->view('include/footer');
	}
	function edit_advertisement_main_image()
	{
		extract($this->input->post());
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('front_image')) {
			$this->session->set_flashdata('msg', 'Error');
			$this->session->set_flashdata('msg_class', 'bg-danger text-white');
			redirect(base_url() . 'index.php/view_advertisement');
		} else {
			$data =  $this->upload->data();

			$config['image_library'] = 'GD2';
			$config['source_image'] = './uploads/' . $data['raw_name'] . $data['file_ext'];

			$this->load->library('image_lib', $config);

			$image = $data['raw_name'] . $data['file_ext'];
			$this->Admin_model->edit_advertisement_main_image($image);

			$this->session->set_flashdata('msg', 'Main Image Updated Successfully');
			$this->session->set_flashdata('msg_class', 'bg-success text-white');
			redirect(base_url() . 'index.php/view_advertisement');
		}
	}

	//...................update inner images of advertisement ................//
	function get_advertisement_images()
	{
		$data['fetch_advertisement_images'] = $this->Admin_model->get_advertisement_images();
		$this->load->view('include/header');
		$this->load->view('edit_advertisement_images', $data);
		$this->load->view('include/footer');
	}

	function edit_advertisement_images()
	{
		extract($this->input->post());
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 200000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('inside_images')) {
			$this->session->set_flashdata('msg', 'Error');
			$this->session->set_flashdata('msg_class', 'bg-danger text-white');
			redirect(base_url() . 'index.php/get_advertisement_images?advertisement_id=' . $advertisement_id);
		} else {
			$data =  $this->upload->data();

			$config['image_library'] = 'GD2';
			$config['source_image'] = './uploads/' . $data['raw_name'] . $data['file_ext'];

			$this->load->library('image_lib', $config);

			$image = $data['raw_name'] . $data['file_ext'];
			$this->Admin_model->edit_advertisement_images($image);

			$this->session->set_flashdata('msg', 'Image Uploaded');
			$this->session->set_flashdata('msg_class', 'bg-success text-white');
			redirect(base_url() . 'index.php/get_advertisement_images?advertisement_id=' . $advertisement_id);
		}
	}

	function delete_inside_image()
	{
		$advertisement_id = $this->input->get('advertisement_id');
		$this->Admin_model->delete_inside_image();

		$this->session->set_flashdata('msg', 'Successfully Deleted');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/get_advertisement_images?advertisement_id=' . $advertisement_id);
	}

	//...................manage feature products ................//
	function manage_feature_products()
	{
		$data['view_advertisement'] = $this->Admin_model->view_feature_advertisement();
		$data['products'] = $this->Admin_model->feature_products();

		$this->load->view('include/header');
		$this->load->view('manage_feature_products', $data);
		$this->load->view('include/footer');
	}

	function add_feature_product()
	{
		$this->Admin_model->add_feature_product();
		$this->session->set_flashdata('msg', 'Featured Product Added Deleted');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/manage_feature_products');
	}

	function remove_feature_product()
	{
		$this->Admin_model->remove_feature_product();
		$this->session->set_flashdata('msg', 'Product Removed');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/manage_feature_products');
	}
	
//...................order stats................//

function all_orders()
	{
		$data['fetch_user_orders'] = $this->Admin_model->fetch_all_orders();

		$this->load->view('include/header');
		$this->load->view('order_stats', $data);
		$this->load->view('include/footer');
	}
	function order_stats()
	{
		$data['fetch_user_orders'] = $this->Admin_model->fetch_user_orders();

		$this->load->view('include/header');
		$this->load->view('order_stats', $data);
		$this->load->view('include/footer');
	}

	function view_order_details()
	{
		$data['fetch_user_order_details'] = $this->Admin_model->fetch_user_order_details();
		
		$this->load->view('include/header');
		$this->load->view('user_order_details', $data);
		$this->load->view('include/footer');
	}

	function accept_for_delivery()
	{
		$this->Admin_model->accept_for_delivery();
		$this->session->set_flashdata('msg', 'Order Accepted');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url() . 'index.php/order_stats');
	}

	function out_of_reach()
	{
		$this->Admin_model->out_of_reach();
		$this->session->set_flashdata('msg', 'Order Rejected');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/order_stats');
	}

//...................review section................//
	function contact_us_review()
	{
		$data['contact_us_review'] = $this->Admin_model->contact_us_review();
		
		$this->load->view('include/header');
		$this->load->view('contact_us_review', $data);
		$this->load->view('include/footer');
	}

	function delete_contact_us_review()
	{
		$this->Admin_model->delete_contact_us_review();
		$this->session->set_flashdata('msg', 'Comment Deleted');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/contact_us_review');
	}

//...................manage team ................//
	function team()
	{

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 200000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('member_pic')) {
            $data =  $this->upload->data();
            $member_pic = $data['raw_name'] . $data['file_ext'];
			$post['member_pic'] = $member_pic;
			
			$this->Admin_model->add_team($member_pic);
			$this->session->set_flashdata('msg', 'Member Added');
			$this->session->set_flashdata('msg_class', 'bg-success text-white');
			redirect(base_url() . 'index.php/basic_info');
        }else{
            $this->session->set_flashdata('msg', 'Error');
            $this->session->set_flashdata('msg_class', 'bg-danger text-white');
			redirect(base_url() . 'index.php/basic_info');

        }
	}

	function delete_team()
	{
		$this->Admin_model->delete_team();
        $this->session->set_flashdata('msg', 'Successfully Deleted');
        $this->session->set_flashdata('msg_class', 'bg-danger text-white');
		redirect(base_url() . 'index.php/basic_info');

	}

	function get_team()
    {
        $data['get_team'] = $this->Admin_model->get_team();

        $this->load->view('include/header');
        $this->load->view('edit_team', $data);
        $this->load->view('include/footer');
    }

    function edit_team()
    {

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 200000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('member_pic')) {
            $data =  $this->upload->data();
            $member_pic = $data['raw_name'] . $data['file_ext'];
            $post['member_pic'] = $member_pic;
        }
		
        $this->Admin_model->edit_team($member_pic);
        $this->session->set_flashdata('msg', 'Successfully Updated');
        $this->session->set_flashdata('msg_class', 'bg-success text-white');
        redirect(base_url() . 'basic_info');
    }


}
