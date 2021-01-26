<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">All Orders</h4>

            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <div class="mr-2">

                    </div>

                    <?php $i = 0;
                    foreach ($fetch_user_orders as $category) { ?>
                        <?php if ($category->status == 'purchased') {
                            $i++;
                        } ?>

                    <?php } ?>
                    <div class=""><small>New Orders</small>
                        <h4 class="text-info mb-0 font-medium"><?= $i ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12">
                            <?php if ($msg = $this->session->flashdata('msg')) {
                                if ($msg_class = $this->session->flashdata('msg_class')) {
                            ?>
                                    <div class="alert <?= $msg_class ?>">
                                        <h4> <?= $msg ?> </h4>
                                    </div>
                            <?php         }
                            }

                            ?>
                        </div>
                            <div style="text-align: center;" >

                                <a href="<?php echo base_url(); ?>index.php/all_orders">
                                <button type="button" class="btn btn-info"style="background-color:">View All Orders</button>
                            </a>
                        </div>

                        <br>
                        <h4 class="card-title">New Orders Pending For Approval</h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Pirce & Quantity</th>
                                        <th>order_date</th>
                                        <th>View More Details</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    if (!empty($fetch_user_orders)) {


                                        foreach ($fetch_user_orders as $category) { ?>
                                            <tr>


                                                <td style="width: 15%;">
                                                    <b>

                                                        <?php echo $category->order_id; ?>
                                                    </b>
                                                        <br>
                                                        <br>

                                                        <?php if($category->status=='purchased'){ ?>
                                                            <a href="<?php echo base_url(); ?>index.php/accept_for_delivery?purchased_products_id=<?php echo $category->purchased_products_id; ?>">
                                                        <button type="button" class="btn btn-info"style="width: 100%;background-color:">Accept for Deliverey</button>
                                                    </a>

                                                    <a href="<?php echo base_url(); ?>index.php/out_of_reach?purchased_products_id=<?php echo $category->purchased_products_id; ?>">
                                                        <button style="background: #e43e3e;margin: 5px 0px;width: 100%;"type="button" class="btn btn-info">Out of Reach</button>
                                                    </a>
                                                       <?php }elseif($category->status=='accept'){?>
                                                       
                                                        <button style="background-color: #3acc42;margin: 5px 0px;width: 100%;"type="button" class="btn btn-info">Accepted</button>
                                                
                                                      <?php }else{ ?>
                                                        <button style="background-color: #e43e3e;margin: 5px 0px;width: 100%;"type="button" class="btn btn-info">Rejected</button>
                                                      <?php } ?>

                                               
                                            </td>
                                                <td><?php echo $category->product_name; ?></td>
                                                <td>
                                                        
                                                        <div style="width: 200px;">
                                                            <img style="width: 100%;" src="<?php echo base_url() . "uploads/" . $category->front_image; ?>" alt="">
                                                        </div>
                                                        

                                                </td>

                                                <td>Price: <b>₹<?php echo $category->product_buy_price; ?></b> &nbsp; & Qty.: <b><?php echo $category->product_buy_quantity; ?></b> & &nbsp; SubTotal: <b><?= $category->subtotal ?></b> </td>


                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i><?php echo $category->order_date; ?></span> </td>
                                                <td>
                                                    <div style="text-align: center; margin:6px " >
                                                    <a href="<?php echo base_url(); ?>index.php/view_order_details?purchased_products_id=<?php echo $category->purchased_products_id; ?>">
                                                        <button type="button" class="btn waves-effect waves-light btn-success">View Deviliry Details</button>
                                                    </a>
                                                </div>
                                                </td>

                                            </tr>
                                        <?php }
                                    } else {  ?>
                                        <tr>
                                            <td colspan="2"> records not found</td>
                                        </tr>
                                    <?php } ?>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>