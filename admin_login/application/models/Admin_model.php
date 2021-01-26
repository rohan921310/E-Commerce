<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    //...................category ................//
    function fetch_basic_info()
    {
        $admin_login_id = $this->session->userdata('admin_login_id');
        $this->db->select('*');
        $this->db->from('basic_info');
        $this->db->where('admin_login_id ', $admin_login_id);

        $query = $this->db->get()->row_array();
        return $query;
    }

    function basic_info_update()
    {
        extract($this->input->post());
        $formArray = array(
            'company_name' => $company_name,
            'company_email' => $company_email,
            'company_mobile' => $company_mobile,
            'company_address' => $company_address,
            'company_working_hour' => $company_working_hour,
            'company_about_us_footer' => $company_about_us_footer,
            'company_insta_link' => $company_insta_link,
            'company_facebook_link' => $company_facebook_link,
            'company_youtube_link' => $company_youtube_link
        );

        $this->db->update('basic_info', $formArray);
    }

    function about_us_page()
    {
        extract($this->input->post());
        $formArray = array(
            'about_us_page' => $about_us_page
        );

        $this->db->update('basic_info', $formArray);
    }

    function contact_us_page()
    {
        extract($this->input->post());
        $formArray = array(
            'contact_us_page' => $contact_us_page
        );

        $this->db->update('basic_info', $formArray);
    }

    function update_privacy()
    {
        extract($this->input->post());
        $formArray = array(
            'company_privacy' => $company_privacy
        );

        $this->db->update('basic_info', $formArray);
    }


    function update_terms()
    {
        extract($this->input->post());
        $formArray = array(
            'company_terms' => $company_terms
        );

        $this->db->update('basic_info', $formArray);
    }



    //...................category ................//
    function category()
    {
        $this->db->select('*');
        $this->db->from('category');
        // $this->db->order_by('category_id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    function category_check()
    {
        date_default_timezone_set("Asia/Kolkata");
        $category_name = $this->input->post('category_name');
        $date = date('Y-m-d h:i:sa ');
        $formArray = array(
            'category_name' => $category_name,
            'category_date'  => $date
        );

        $this->db->insert('category', $formArray);
    }

    function delete_category()
    {
        $category_id = $this->input->get('category_id');
        $this->db->where('category_id', $category_id);
        $this->db->delete('category');
    }

    //...................sub category ................//
    function sub_category()
    {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->join('category', 'category.category_id  = sub_category.category_id', 'left');
        $this->db->order_by('category_name', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    function sub_category_check()
    {
        date_default_timezone_set("Asia/Kolkata");
        $category_id = $this->input->post('category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        $date = date('Y-m-d h:i:sa ');
        $formArray = array(
            'sub_category_name' => $sub_category_name,
            'category_id'  => $category_id,
            'sub_category_date' => $date
        );

        $this->db->insert('sub_category', $formArray);
    }

    function delete_sub_category()
    {
        $sub_category_id = $this->input->get('sub_category_id');
        $this->db->where('sub_category_id', $sub_category_id);
        $this->db->delete('sub_category');
    }

    function fetch_sub_category()
    {
        $category_id = $this->input->post('category_id');
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('category_id', $category_id);

        return $this->db->get()->result_array();
    }

    //...................Advertisements ................//
    function add_advertisement($image)
    {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');

        extract($this->input->post());
        $formArray = array(

            'front_image' => $image,
            'category_id' => $category_id,
            'sub_category_id' => $sub_category_id,
            'product_name' => $product_name,
            'product_quantity' => $product_quantity,
            'product_actual_price' => $product_actual_price,
            'product_offer_price' => $product_offer_price,
            'product_description' => $product_description,
            'product_description_main' => $product_description_main,
            'product_more_description' => $product_more_description,
            'advertisement_date' => $date
        );

        $this->db->insert('advertisement', $formArray);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    function add_all_image($data = array(), $last_id)
    {
        extract($this->input->post());
        $formArray = array(
            'inside_image' => $data,
            'advertisement_id' => $last_id
        );
        $this->db->insert('inside_images', $formArray);
    }

    function view_advertisement()
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->join('category', 'category.category_id  = advertisement.category_id', 'left');
        $this->db->join('sub_category', 'sub_category.sub_category_id  = advertisement.sub_category_id', 'left');

        $this->db->order_by('advertisement_id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    function delete_advertisement()
    {
        $advertisement_id = $this->input->get('advertisement_id');
        $this->db->where('advertisement_id ', $advertisement_id);
        $this->db->delete('advertisement');

        $this->db->where('advertisement_id ', $advertisement_id);
        $this->db->delete('inside_images');
    }

    function get_advertisement()
    {
        $advertisement_id = $this->input->get('advertisement_id');
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('advertisement_id ', $advertisement_id);

        $this->db->join('category', 'category.category_id  = advertisement.category_id', 'left');
        $this->db->join('sub_category', 'sub_category.sub_category_id  = advertisement.sub_category_id', 'left');

        $query = $this->db->get()->row_array();
        return $query;
    }

    function edit_advertisement()
    {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');

        $advertisement_id = $this->input->post('advertisement_id');
        extract($this->input->post());
        $this->db->where('advertisement_id', $advertisement_id);
        $formArray = array(
            'category_id' => $category_id,
            'sub_category_id' => $sub_category_id,
            'product_name' => $product_name,
            'product_quantity' => $product_quantity,
            'product_actual_price' => $product_actual_price,
            'product_offer_price' => $product_offer_price,
            'product_description' => $product_description,
            'product_description_main' => $product_description_main,
            'product_more_description' => $product_more_description,
            'advertisement_date' => $date
        );
        $this->db->update('advertisement', $formArray);
    }

    //...................update main image of advertisement ................//
    function get_advertisement_front_image()
    {
        $advertisement_id = $this->input->get('advertisement_id');
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('advertisement_id ', $advertisement_id);

        $query = $this->db->get()->row_array();
        return $query;
    }

    function edit_advertisement_main_image($image)
    {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');

        $advertisement_id = $this->input->post('advertisement_id');
        extract($this->input->post());
        $this->db->where('advertisement_id', $advertisement_id);
        $formArray = array(
            'advertisement_date' => $date,
            'front_image' => $image
        );
        $this->db->update('advertisement', $formArray);
    }

    //...................update inner images of advertisement ................//
    function get_advertisement_images()
    {
        $advertisement_id = $this->input->get('advertisement_id');
        $this->db->select('*');
        $this->db->from('inside_images');
        $this->db->where('advertisement_id ', $advertisement_id);

        $query = $this->db->get();
        return $query->result();
    }

    function edit_advertisement_images($image)
    {
        $advertisement_id = $this->input->post('advertisement_id');

        $formArray = array(
            'inside_image' => $image,
            'advertisement_id' => $advertisement_id
        );
        $this->db->insert('inside_images', $formArray);
    }

    function delete_inside_image()
    {
        $inside_images_id = $this->input->get('inside_images_id');
        $this->db->where('inside_images_id ', $inside_images_id);

        $this->db->delete('inside_images');
    }

    //...................manage feature products ................//

    function view_feature_advertisement()
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('feature_product', 0);
        $query = $this->db->get();
        return $query->result();
    }

    function feature_products()
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('feature_product', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function add_feature_product()
    {
        $advertisement_id = $this->input->post('advertisement_id');
        $this->db->where('advertisement_id ', $advertisement_id);
        $formArray = array(
            'feature_product' => 1
        );
        $this->db->update('advertisement', $formArray);
    }

    function remove_feature_product()
    {
        $advertisement_id = $this->input->get('advertisement_id');
        $this->db->where('advertisement_id ', $advertisement_id);
        $formArray = array(
            'feature_product' => 0
        );
        $this->db->update('advertisement', $formArray);
    }

    //...................order stats................//

    function fetch_all_orders()
    {
        $this->db->select('*');
        $this->db->from('purchased_products');
        $this->db->join('advertisement', 'advertisement.advertisement_id  = purchased_products.advertisement_id', 'left');

        $this->db->order_by('purchased_products_id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    function fetch_user_orders()
    {
        $this->db->select('*');
        $this->db->from('purchased_products');
        $this->db->join('advertisement', 'advertisement.advertisement_id  = purchased_products.advertisement_id', 'left');
        $this->db->where('status ', 'purchased');

        $this->db->order_by('purchased_products_id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    function fetch_user_order_details()
    {
        $purchased_products_id = $this->input->get('purchased_products_id');

        $this->db->select('*');
        $this->db->from('purchased_products');
        $this->db->where('purchased_products_id', $purchased_products_id);

        $this->db->join('advertisement', 'advertisement.advertisement_id  = purchased_products.advertisement_id', 'left');

        $query = $this->db->get()->row_array();
        return $query;
    }

    function accept_for_delivery()
    {
        $purchased_products_id = $this->input->get('purchased_products_id');
        $this->db->where('purchased_products_id ', $purchased_products_id);
        $formArray = array(
            'status' => 'accept'
        );
        $this->db->update('purchased_products', $formArray);
    }

    function out_of_reach()
    {
        $purchased_products_id = $this->input->get('purchased_products_id');
        $this->db->where('purchased_products_id ', $purchased_products_id);
        $formArray = array(
            'status' => 'rejected'
        );
        $this->db->update('purchased_products', $formArray);
    }

    //...................front page ................//
    
    function fetch_main_banner()
    {
        $admin_login_id = $this->session->userdata('admin_login_id');

        $this->db->select('*');
        $this->db->from('main_banner');
        $this->db->where('admin_login_id', $admin_login_id);

        $query = $this->db->get()->row_array();
        return $query;
    }

    function main_banner($main_banner2, $main_banner3, $main_banner1)
    {
        $admin_login_id = $this->session->userdata('admin_login_id');
        extract($this->input->post());
        if ($main_banner2) {
        $this->db->where('admin_login_id ', $admin_login_id);
            $formArray1 = array(
                'main_banner2' => $main_banner2,
            );
            $data['query1'] = $this->db->update('main_banner', $formArray1);
        }

        if ($main_banner3) {
            $this->db->where('admin_login_id ', $admin_login_id);

            $formArray2 = array(
                'main_banner3' => $main_banner3,
            );
            $data['query3'] = $this->db->update('main_banner', $formArray2);
        }

        if ($main_banner1) {
            $this->db->where('admin_login_id ', $admin_login_id);
            $formArray2 = array(
                'main_banner1' => $main_banner1,
            );
            $data['query2'] = $this->db->update('main_banner', $formArray2);
        }
        return $data['query4']->result;
    }

    function mini_banner($mini_banner1, $mini_banner2, $mini_banner3)
    {
        $admin_login_id = $this->session->userdata('admin_login_id');
        extract($this->input->post());
        if ($mini_banner1) {
        $this->db->where('admin_login_id ', $admin_login_id);
            $formArray1 = array(
                'mini_banner1' => $mini_banner1,
            );
            $data['query1'] = $this->db->update('main_banner', $formArray1);
        }

        if ($mini_banner2) {
            $this->db->where('admin_login_id ', $admin_login_id);

            $formArray2 = array(
                'mini_banner2' => $mini_banner2,
            );
            $data['query3'] = $this->db->update('main_banner', $formArray2);
        }

        if ($mini_banner3) {
            $this->db->where('admin_login_id ', $admin_login_id);
            $formArray2 = array(
                'mini_banner3' => $mini_banner3,
            );
            $data['query2'] = $this->db->update('main_banner', $formArray2);
        }
        return $data['query4']->result;
    }


//...................review section................//
    function contact_us_review()
    {
        $this->db->select('*');
        $this->db->from('contact_us_reviews');
        $this->db->order_by('contact_us_reviews_id', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function delete_contact_us_review()
    {
        $contact_us_reviews_id = $this->input->get('contact_us_reviews_id');
        $this->db->where('contact_us_reviews_id', $contact_us_reviews_id);
        $this->db->delete('contact_us_reviews');
    }

//...................manage team ................//
    function fetch_member()
    {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->order_by('team_id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    function add_team($member_pic)
    {
        extract($this->input->post());
        $formArray = array(
            'member_pic' => $member_pic,
            'about_member' => $about_member,
            'member_position' => $member_position,
            'member_name' => $member_name,
            
        );

        $this->db->insert('team', $formArray);
    }

    function delete_team()
    {
        $team_id = $this->input->get('team_id');
        $this->db->where('team_id', $team_id);
        $this->db->delete('team');
    }


    function get_team()
    {
        $team_id = $this->input->get('team_id');
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('team_id ', $team_id);

        $query = $this->db->get()->row_array();
        return $query;
    }

    function edit_team($member_pic)
    {
        extract($this->input->post());
        $this->db->where('team_id ', $team_id);
        $formArray = array(
            'about_member' => $about_member,
            'member_position' => $member_position,
            'member_name' => $member_name,
        );
        $this->db->update('team', $formArray); 

        if($member_pic != null){
            $this->db->where('team_id ', $team_id);
            $formArray = array(
                'member_pic' => $member_pic
            );
            $this->db->update('team', $formArray); 
        }

    }


    
}
