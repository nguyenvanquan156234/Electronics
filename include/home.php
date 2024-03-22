<style>
	/* CSS cho phần trả lời bình luận */
	.reply-form {
		margin-top: 10px;
		/* Khoảng cách giữa các phần tử */
	}

	.reply-link {
		display: block;
		margin-top: 10px;
		/* Khoảng cách giữa các phần tử */
		color: blue;
	}

	.reply-form textarea {
		width: 100%;
		padding: 5px;
		border-radius: 5px;
		border: 1px solid #ccc;
		resize: vertical;
	}

	.reply-form button {
		margin-top: 5px;
		padding: 5px 10px;
		background-color: #007bff;
		color: #fff;
		border: none;
		border-radius: 5px;
		cursor: pointer;
	}

	/* CSS cho phần tử bên phải */
	.right-align {
		float: right;
		font-size: 12px;
		/* Font chữ nhỏ hơn */
		color: #666;
		/* Màu chữ nhạt */
	}
</style>
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<h3 style="padding : 10px; text-align:center"> Danh mục Sản phẩm</h3>
		</h3>
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
					<!-- first section -->
					<?php
					$sql_cate_home = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
					while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
						$id_category = $row_cate_home['category_id'];

					?>
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic"><?php echo $row_cate_home['category_name'] ?></h3>
							<div class="row">
								<?php

								if (isset($_GET['trang'])) {
									$page = $_GET['trang'];
								} else {
									$page = '';
								}
								if ($page == '' || $page == '1') {

									$sql_product = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC ");
									while ($row_sanpham = mysqli_fetch_array($sql_product)) {
										if ($row_sanpham['category_id'] == $id_category) {

								?>
											<div class="col-md-6 product-men mt-5">
												<div class="men-pro-item simpleCart_shelfItem">
													<div class="men-thumb-item text-center">
														<img src="images/<?php echo $row_sanpham['sanpham_image']; ?>" alt="" height="300px" width="150px">
														<div class="men-cart-pro">
															<div class="inner-men-cart-pro">

																<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id']; ?>" class="link-product-add-cart">Xem sản phẩm</a>

															</div>
														</div>
													</div>
													<div class="item-info-product text-center border-top mt-4">
														<h4 class="pt-1">
															<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id']; ?>"><?php echo $row_sanpham['sanpham_name']; ?></a>
														</h4>
														<div class="info-product-price my-2">
															<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . ' vnđ'; ?></span>
															<del><?php echo number_format($row_sanpham['sanpham_gia']) . ' vnđ'; ?></del>
															<span class="item_price">Số Lượng:

																<?php
																if ($row_sanpham['sanpham_soluong'] > 0) {


																	echo $row_sanpham['sanpham_soluong'];
																} else {
																	echo "Đã hết hàng";
																}
																?>

															</span> <br>
															<span class="item_price">Số lượt xem: <?php echo $row_sanpham['luotxem']; ?></span>
														</div>
														<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
															<form action="?quanly=giohang" method="post">
																<fieldset>
																	<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
																	<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
																	<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_giakhuyenmai'] ?>" />
																	<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
																	<input type="hidden" name="soluong" value="1" />
																	<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
												</div>
											</div>
									<?php
										}
									}
									?>
									<?php
								} else {
									$begin = ($page * 3) - 3;



									$sql_product = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC LIMIT $begin,4");
									while ($row_sanpham = mysqli_fetch_array($sql_product)) {
										if ($row_sanpham['category_id'] == $id_category) {
									?>
											<div class="col-md-6 product-men mt-5">
												<div class="men-pro-item simpleCart_shelfItem">
													<div class="men-thumb-item text-center">
														<img src="images/<?php echo $row_sanpham['sanpham_image']; ?>" alt="">
														<div class="men-cart-pro">
															<div class="inner-men-cart-pro">
																<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id']; ?>" class="link-product-add-cart">Xem sản phẩm</a>
															</div>
														</div>
													</div>
													<div class="item-info-product text-center border-top mt-4">
														<h4 class="pt-1">
															<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id']; ?>"><?php echo $row_sanpham['sanpham_name']; ?></a>
														</h4>
														<div class="info-product-price my-2">
															<span class="item_price"><?php echo $row_sanpham['sanpham_giakhuyenmai']; ?></span>
															<del><?php echo $row_sanpham['sanpham_gia']; ?></del>

															<span class="item_price">Số lượt xem: <?php echo $row_sanpham['luotxem']; ?></span>

														</div>
														<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
															<form action="?quanly=giohang" method="post">
																<fieldset>
																	<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
																	<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
																	<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
																	<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
																	<input type="hidden" name="soluong" value="1" />
																	<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
												</div>
											</div>
								<?php
										}
									}
								}
								?>

							</div>
						</div>
					<?php } ?>
					<!-- //first section -->
					<div class="container mt-5">
						<!-- Nội dung sản phẩm -->


						<!-- Phân trang -->
						<nav aria-label="Page navigation">
							<p>Trang: </p>
							<?php
							$sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
							$sql_count = mysqli_num_rows($sql_trang);
							$trang = $sql_count / 3;
							?>
							<ul class="pagination justify-content-center">
								<?php
								for ($i = 2; $i <= $trang; $i++) {


								?>
									<li class="page-item"><a <?php
																if ($i == $page) {
																	echo 'style="background:brown;"';
																} else {
																	echo '';
																}
																?> class="page-link" href="?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>

								<?php } ?>
							</ul>
						</nav>
					</div>


				</div>
			</div>
			<!-- //product left -->

			<!-- product right -->
			<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
				<div class="side-bar p-sm-4 p-3">

					<!-- price -->

					<!-- //price -->
					<!-- discounts -->

					<!-- //discounts -->
					<!-- reviews -->
					<div class="customer-rev border-bottom left-side py-2">
						<h3 class="agileits-sear-head mb-3">Khách hàng Review</h3>
						<a href="?quanly=danhgia" class="btn btn-primary">Viết đánh giá</a>
						<ul>
							<?php


							$sql_danhgia = mysqli_query($mysqli, 'SELECT * FROM tbl_danhgia ORDER BY danhgia_id DESC');

							while ($row_danhgia = mysqli_fetch_array($sql_danhgia)) {
								echo '<li>';
								echo '<h5>' . $row_danhgia['danhgia_name'] . '</h5>';
								for ($star = 1; $star <= $row_danhgia['danhgia_rating']; $star++) {
									echo '<i class="fas fa-star';
									if ($row_danhgia['danhgia_rating'] >= $star) {
										echo ' active'; // Thêm class 'active' nếu đánh giá là >= star
									}
									echo '"></i>';
								}
								echo '<p>' . $row_danhgia['danhgia_binhluan'] . '</p>';
								$sql_binhluan = mysqli_query($mysqli, "SELECT * FROM tbl_binhluan WHERE danhgia_id='" . $row_danhgia['danhgia_id'] . "' ORDER BY binhluan_id DESC");

								while ($row_binhluan = mysqli_fetch_array($sql_binhluan)) {
									// Lấy các bình luận tương ứng với mỗi đánh giá
									echo "<div class='right-align'>";
									echo "<p>" . htmlspecialchars($row_binhluan['binhluan_name']) . "</p>";
									echo "<p>" . htmlspecialchars($row_binhluan['binhluan_email']) . "</p>";
									echo "<p>" . nl2br(htmlspecialchars($row_binhluan['binhluan_noidung'])) . "</p>";
									echo "</div>";
								}
								// Thêm liên kết để trả lời bình luận
								echo '<a href="index.php?quanly=traloi&id=' . $row_danhgia['danhgia_id'] . '">Trả lời</a>';




								// Kiểm tra xem có phải đánh giá đang được trả lời hay không


								echo '</li>';
							}
							?>
						</ul>


					</div>
					<!-- //reviews -->
					<!-- electronics -->
					<div class="left-side border-bottom py-2">

						<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
						<ul>
							<?php
							$sql_category_sidebar = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
							while ($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)) {

							?>
								<li>

									<span class="span"><a href="?quanly=danhmuc&id=<?php echo $row_category_sidebar['category_id']; ?>"><?php echo $row_category_sidebar['category_name']; ?></a></span>
								</li>
							<?php
							}
							?>
						</ul>
					</div>
					<!-- //electronics -->
					<!-- delivery -->

					<!-- best seller -->
					<div class="f-grid py-2">
						<h3 class="agileits-sear-head mb-3">sản phẩm bán chạy</h3>
						<div class="box-scroll">
							<div class="scroll">
								<div class="row">
									<?php
									$sql_product_sidebar = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC");
									while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {

									?>
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image']; ?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_sanpham_sidebar['sanpham_name']; ?></a>

											<a href="" class="price-mar mt-2"><?php echo $row_sanpham_sidebar['sanpham_giakhuyenmai']; ?></a>
											<del><?php echo $row_sanpham_sidebar['sanpham_gia']; ?></del>
										</div>

									<?php
									}
									?>
								</div>


							</div>
						</div>
					</div>
					<!-- //best seller -->
				</div>
				<!-- //product right -->
			</div>
		</div>
	</div>
</div>