<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Admin extends CI_Controller
{
  //...........home page .................//
  function home()
  {
    //...........for header and footer.................//
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();
    $data['fetch_main_banner'] = $this->Admin_model->fetch_main_banner();


    //...........for view page.................//
    $data['fetch_feature_product'] = $this->Admin_model->fetch_feature_product();
    $data['fetch_members'] = $this->Admin_model->fetch_members();

    $this->load->view('home', $data);

  }

  //...........about us .................//
  function about_us()
  {
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();

    //...........for view page.................//
    $data['fetch_members'] = $this->Admin_model->fetch_members();
    
    $this->load->view('include/header', $data);
    $this->load->view('about_us', $data);
    $this->load->view('include/footer', $data);
  }

 //...........contact us .................//
 function contact_us()
 {
   $data['fetch_category'] = $this->Admin_model->category();
   $data['fetch_sub_category'] = $this->Admin_model->sub_category();
   $data['cart_items'] = $this->cart->contents();
   $data['fetch_tags'] = $this->Admin_model->fetch_tags();
   $data['basic_info'] = $this->Admin_model->basic_info();

   //...........for view page.................//
   
   $this->load->view('include/header', $data);
   $this->load->view('contact_us', $data);
   $this->load->view('include/footer', $data);
 }

  function contact_us_reviews()
  {
    $this->Admin_model->contact_us_reviews();

    $this->session->set_flashdata('msg', 'Review Submitted !!!!!');
    $this->session->set_flashdata('msg_class', 'bg-info text-white');
    redirect(base_url() . 'index.php/contact_us');
  }

  function privacy()
  {
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();
 
    //...........for view page.................//
    $data['fetch_members'] = $this->Admin_model->fetch_members();
    
    $this->load->view('include/header', $data);
    $this->load->view('privacy', $data);
    $this->load->view('include/footer', $data);
  }
  


  //...........view products.................//
  function view_products()
  {
    //...........for header and footer.................//
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();

    //...........for view page.................//
    $data['fetch_sub_category_names'] = $this->Admin_model->sub_category_names();
    $data['fetch_add_by_get'] = $this->Admin_model->fetch_add_by_get();
    $data['fetch_feature_product1'] = $this->Admin_model->fetch_feature_product1();
    $data['fetch_feature_product2'] = $this->Admin_model->fetch_feature_product2();

    $this->load->view('include/header', $data);
    $this->load->view('view_products', $data);
    $this->load->view('include/footer', $data);
  }

  function fetch_data()
  {
    echo json_encode($this->Admin_model->fetch_add());
  }

  function searching()
  {
    echo json_encode($this->Admin_model->searching());
  }

  //...........view products details.................//

  function view_product_details()
  {
    //...........for header and footer.................//
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();

    //...........for view page.................//
    $data['view_advertisement'] = $this->Admin_model->view_advertisement();
    $data['view_advertisement_images'] = $this->Admin_model->view_advertisement_images();
    $data['view_related_products'] = $this->Admin_model->view_related_products();



    $this->load->view('include/header', $data);
    $this->load->view('view_product_details', $data);
    $this->load->view('include/footer', $data);
  }


  //...........add to cart.................//

  function add_to_cart()
  {
    $advertisement_id = $this->input->post('add_id');
    $quantity = $this->input->post('quantity');

    if ($quantity) {
      $qty = $quantity;
    } else {
      $qty = 1;
    }

    $data = $this->Admin_model->add_to_cart($advertisement_id);
    $cart = array(

      'id' => $data['advertisement_id'],
      'qty' => $qty,
      'price' => $data['product_offer_price'],
      'description' => $data['product_description'],
      'name' => $data['product_name'],
      'image' => $data['front_image'],
    );
    $this->cart->insert($cart);
  }

  function add_to_cart_by_ajax()
  {
    $advertisement_id = $this->input->get('advertisement_id');
    $quantity = $this->input->post('quantity');
    // print_r($advertisement_id);die;
    if ($quantity) {
      $qty = $quantity;
    } else {
      $qty = 1;
    }

    $data = $this->Admin_model->add_to_cart($advertisement_id);
    $cart = array(

      'id' => $data['advertisement_id'],
      'qty' => $qty,
      'price' => $data['product_offer_price'],
      'description' => $data['product_description'],
      'name' => $data['product_name'],
      'image' => $data['front_image'],
    );
    $this->cart->insert($cart);
    redirect(base_url() . 'index.php/view_products');
  }

  function destroy_cart_item()
  {
    $rowid = $this->input->post('rowid');
    $this->cart->remove($rowid);
  }

  function update_cart()
  {
    $rowid = $this->input->post('rowid');
    $update_quantity = $this->input->post('update_quantity');
    $data = array(
      'rowid'  => $rowid,
      'qty'    => $update_quantity,
    );
    $this->cart->update($data);
  }

  function clear_cart()
  {
    $this->cart->destroy();
  }
  //...........view cart.................//
  function view_cart()
  {
    //...........for header and footer.................//
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();


    $this->load->view('include/header', $data);
    $this->load->view('view_cart', $data);
    $this->load->view('include/footer', $data);
  }

  //...........checkout .................//
  function checkout()
  {
    //...........for header and footer.................//
    $data['fetch_category'] = $this->Admin_model->category();
    $data['fetch_sub_category'] = $this->Admin_model->sub_category();
    $data['cart_items'] = $this->cart->contents();
    $data['fetch_tags'] = $this->Admin_model->fetch_tags();
    $data['basic_info'] = $this->Admin_model->basic_info();


    $this->load->view('include/header', $data);
    $this->load->view('checkout', $data);
    $this->load->view('include/footer', $data);
  }
}
