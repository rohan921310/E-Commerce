<main class="main">
		           
<div class="category-banner-container bg-gray">
		<div class="col-12 " id="login_error">
            
			<?php if ($msg = $this->session->flashdata('msg')) {
				if ($msg_class = $this->session->flashdata('msg_class')) {
			?>
					<div style="border-radius:12px; text-align:center; " class="alert mt-2 <?= $msg_class ?>">
						<h4 style="color: white;"> <?= $msg ?> </h4>
					</div>
			<?php         }
			}

			?>
		</div>
    </div>

			<div class="container mt-2 ">
				<div class="row">
					<div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>Your Orders</h2>

                        <div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="product-col">Product</th>
										<th class="price-col">Price</th>
										<th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                        
									</tr>
								</thead>
								<tbody>
									

                                <?php if($fetch_user_orders== NULL){ ?>
                                <tr class="product-row">
                                <td colspan="5" >No Orders Found</td>

                                </tr>
                                
                            <?php } foreach ($fetch_user_orders as $cart) { ?>
									<tr class="product-row">
										<td class="product-col">
											<figure class="product-image-container">
												<a href="<?= base_url() ?>index.php/view_product_details?advertisement_id=<?= $cart->advertisement_id ?>" class="product-image">
													<img src="<?= base_url() ?>admin_login/uploads/<?= $cart->front_image ?>" alt="product">
												</a>
											</figure>
											<h2 class="product-title">
												<a href="<?= base_url() ?>index.php/view_product_details?advertisement_id=<?= $cart->advertisement_id ?>"><?= $cart->product_name ?></a>
											</h2>
										</td>
										<td>₹<?= $cart->product_buy_price ?></td>
										
                                        <td> Qty: <?= $cart->product_buy_quantity ?></td>
										<td>Total:₹<?= $cart->subtotal ?></td>
                                        <td><?= $cart->status ?> On<br>
                                        <?= $cart->order_date ?>

                                    </td>
                                        
									</tr>
                                    <?php } ?>
								</tbody>

							</table>
						</div>
					</div><!-- End .col-lg-9 -->




                   



					<aside class="sidebar col-lg-3">
						<div class="widget widget-dashboard">
							<h3 class="widget-title">My Account</h3>

							<ul class="list">
								<li ><a href="<?= base_url() ?>index.php/user_profile">Account Dashboard</a></li>
								<!-- <li><a href="#">Account Information</a></li>
								<li><a href="#">Address Book</a></li> -->
								<li class="active"><a href="<?= base_url() ?>index.php/user_orders">My Orders</a></li>
								<!-- <li><a href="#">Billing Agreements</a></li>
								<li><a href="#">Recurring Profiles</a></li> -->
								<li><a href="<?= base_url() ?>index.php/user_reviews">My Product Reviews</a></li>
								<!-- <li><a href="#">My Tags</a></li>
								<li><a href="#">My Wishlist</a></li>
								<li><a href="#">My Applications</a></li>
								<li><a href="#">Newsletter Subscriptions</a></li>
								<li><a href="#">My Downloadable Products</a></li> -->
							</ul>
						</div><!-- End .widget -->
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-5"></div><!-- margin -->
		</main><!-- End .main -->