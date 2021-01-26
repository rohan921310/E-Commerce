<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  User_data_manage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        error_reporting(0);

        if ($this->session->userdata('user_email')) {
        } else {
            $this->session->set_flashdata('msg', 'Please Login First');
            $this->session->set_flashdata('msg_class', 'bg-danger text-white');
            redirect(base_url());
        }
    }

    function user_profile()
    {
        //...........for header and footer.................//
        $data['fetch_category'] = $this->Admin_model->category();
        $data['fetch_sub_category'] = $this->Admin_model->sub_category();
        $data['cart_items'] = $this->cart->contents();
        $data['fetch_tags'] = $this->Admin_model->fetch_tags();
        $data['basic_info'] = $this->Admin_model->basic_info();

        //...........for view page.................//
        $data['fetch_user_data'] = $this->User_model->fetch_user_data();

        $this->load->view('include/header', $data);
        $this->load->view('user_profile', $data);
        $this->load->view('include/footer', $data);
    }

    function change_user_detials()
    {
        $resutl = $this->User_model->change_user_detials();
        if ($resutl == 1) {
            $this->session->set_flashdata('msg', 'Profile Details Updated');
            $this->session->set_flashdata('msg_class', 'bg-info text-white');
            redirect(base_url() . 'index.php/user_profile');
        } elseif ($resutl == 3) {
            $this->session->set_flashdata('msg', 'Password Changed!!!');
            $this->session->set_flashdata('msg_class', 'bg-info text-white');
            redirect(base_url() . 'index.php/user_profile');
        } elseif ($resutl == 2) {
            $this->session->set_flashdata('msg', 'Passwords Not Matched');
            $this->session->set_flashdata('msg_class', 'bg-danger text-white');
            redirect(base_url() . 'index.php/user_profile');
        } else {
            $this->session->set_flashdata('msg', 'Password Not Matched!!! Please Try Again..');
            $this->session->set_flashdata('msg_class', 'bg-danger text-white');
            redirect(base_url() . 'index.php/user_profile');
        }
    }

    function user_orders()
    {
        //...........for header and footer.................//
        $data['fetch_category'] = $this->Admin_model->category();
        $data['fetch_sub_category'] = $this->Admin_model->sub_category();
        $data['cart_items'] = $this->cart->contents();
        $data['fetch_tags'] = $this->Admin_model->fetch_tags();
        $data['basic_info'] = $this->Admin_model->basic_info();

        //...........for view page.................//
        $data['fetch_user_orders'] = $this->Admin_model->fetch_user_orders();

        $this->load->view('include/header', $data);
        $this->load->view('user_orders', $data);
        $this->load->view('include/footer', $data);
    }

    //...........checkout review .................//

    function checkout_review()
    {
        //...........for header and footer.................//
        $data['fetch_category'] = $this->Admin_model->category();
        $data['fetch_sub_category'] = $this->Admin_model->sub_category();
        $data['cart_items'] = $this->cart->contents();
        $data['fetch_tags'] = $this->Admin_model->fetch_tags();
        $data['basic_info'] = $this->Admin_model->basic_info();

        //...........for view page.................//
        $data['checkout_name'] = $this->input->post('checkout_name');
        $data['checkout_mobile'] = $this->input->post('checkout_mobile');
        $data['checkout_address'] = $this->input->post('checkout_address');
        $data['checkout_city'] = $this->input->post('checkout_city');
        $data['checkout_state'] = $this->input->post('checkout_state');
        $data['checkout_pin_code'] = $this->input->post('checkout_pin_code');

        $this->load->view('include/header', $data);
        $this->load->view('checkout_review', $data);
        $this->load->view('include/footer', $data);
    }

    function place_order()
    {
        $user_id = $this->session->userdata('user_details_id');
        extract($this->input->post());

        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d h:i:sa ');
        
        $data = $this->cart->contents();
        foreach ($data as $cart) {
            $order_id = mt_rand(100000, 999999);
            $order_details = array(
                'advertisement_id' => $cart['id'],
                'product_buy_price' => $cart['price'],
                'product_buy_quantity' => $cart['qty'],
                'subtotal' => $cart['subtotal'],
                'order_total' => $this->cart->total(),
                'order_date' => $date,
                'status' => 'purchased',
                'user_id' => $user_id,

                'checkout_name' => $checkout_name,
                'checkout_mobile' => $checkout_mobile,
                'checkout_address' => $checkout_address,
                'order_id' => $order_id
            );
            $this->db->insert('purchased_products', $order_details);
        }
        $this->cart->destroy();

        $this->session->set_flashdata('msg', 'Order Placed');
        $this->session->set_flashdata('msg_class', 'bg-info text-white');
        redirect(base_url() . 'index.php/view_products');
    }
}
