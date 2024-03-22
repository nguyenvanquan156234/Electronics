<style>
	.product-sec1 {
		box-shadow: 0px 0px 15px 0px #D6D6D6;
	}
</style>

<body>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		$id = '';
	}
	$sql_cate_home = mysqli_query($mysqli, "SELECT * FROM tbl_category a, tbl_sanpham b 
						WHERE a.category_id = b.category_id 
						AND b.category_id = '$id' 
						ORDER BY a.category_id DESC LIMIT 2");
	$sql_cate = mysqli_query($mysqli, "SELECT * FROM tbl_category a, tbl_sanpham b 
	WHERE a.category_id = b.category_id 
	AND b.category_id = '$id' 
	ORDER BY a.category_id DESC");
	$row_title = mysqli_fetch_array($sql_cate);
	$title = $row_title['category_name'];

	?>
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $title; ?></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php
								if (isset($_GET['index.php?quanly=danhmuc&id=4;'])) {
									$them = $_GET['index.php?quanly=danhmuc&id=4;'];
								} else {
									$them = '';
								}



								while ($row_sanpham = mysqli_fetch_array($sql_cate_home)) {

								?>
									<div class="col-md-4 product-men">
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
													<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).' vnđ'; ?></span>
													<del><?php echo number_format($row_sanpham['sanpham_gia']).' vnđ'; ?></del>
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
								?>
							</div>
						</div>
						<div id="hienthi" style="display: none;">
							<div class="product-sec1 ">
								<div class="row">
									<?php
									if (isset($_GET['show_more']) && $_GET['show_more'] == 1) {
										$sql_cate_them = mysqli_query($mysqli, "SELECT * FROM tbl_category a, tbl_sanpham b 
									WHERE a.category_id = b.category_id 
									AND b.category_id = '$id' 
									ORDER BY a.category_id DESC
									LIMIT 0,3"); // Lấy 3 sản phẩm tiếp theo, bắt đầu từ vị trí thứ 4

										while ($row_sanpham = mysqli_fetch_array($sql_cate_them)) {

											echo '<div class="col-md-4 product-men py-4">
											<div class="men-pro-item simpleCart_shelfItem">
												<div class="men-thumb-item text-center">
													<img src="images/' . $row_sanpham['sanpham_image'] . '" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="?quanly=chitietsp&id=' . $row_sanpham['sanpham_id'] . '" class="link-product-add-cart">Xem sản phẩm</a>
														</div>
													</div>
												</div>
												<div class="item-info-product text-center border-top mt-4">
													<h4 class="pt-1">
														<a href="?quanly=chitietsp&id=' . $row_sanpham['sanpham_id'] . '">' . $row_sanpham['sanpham_name'] . '</a>
													</h4>
													<div class="info-product-price my-2">
														<span class="item_price">' . number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' . '</span>
														<del>' . number_format($row_sanpham['sanpham_gia']).'vnđ' . '</del>
													</div>
													<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
														<form action="?quanly=giohang" method="post">
															<fieldset>
																<input type="hidden" name="tensanpham" value="' . $row_sanpham['sanpham_name'] . '" />
																<input type="hidden" name="sanpham_id" value="' . $row_sanpham['sanpham_id'] . '" />
																<input type="hidden" name="giasanpham" value="' . number_format($row_sanpham['sanpham_giakhuyenmai']).'vnd' . '" />
																<input type="hidden" name="hinhanh" value="' . $row_sanpham['sanpham_image'] . '" />
																<input type="hidden" name="soluong" value="1" />
																<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
															</fieldset>
														</form>
													</div>
												</div>
											</div>
									</div>';
										}
									}
									?>
								</div>
							</div>
						</div>
						<a href="index.php?quanly=danhmuc&id=4&show_more=1" onclick="showMoreProducts()">Hiển thị thêm sản phẩm</a>
						<script>
							var divToToggle = document.getElementById("hienthi");

							if (divToToggle.style.display === "none") {
								divToToggle.style.display = "block";
							} else {
								divToToggle.style.display = "none";
							}
						</script>


						<!-- second section -->

						<!-- //second section -->
						<!-- 3rd section -->

						<!-- //3rd section -->
						<!-- fourth section -->

						<!-- //fourth section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>


</body>