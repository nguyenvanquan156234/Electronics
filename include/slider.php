<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" mt-0>
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <?php 
            $sql_slider = mysqli_query($mysqli, "SELECT * FROM tbl_slider WHERE slider_active = '1' ORDER BY slider_id");
            $item_count = 0;
            while($row_slider = mysqli_fetch_array($sql_slider)) {
                $active_class = ($item_count == 0) ? 'class="active"' : '';
        ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $item_count; ?>" <?php echo $active_class; ?>></li>
        <?php 
                $item_count++;
            }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php 
            $sql_slider = mysqli_query($mysqli, "SELECT * FROM tbl_slider WHERE slider_active = '1' ORDER BY slider_id");
            $item_count = 0;
            while($row_slider = mysqli_fetch_array($sql_slider))	{
                $active_class = ($item_count == 0) ? 'active' : '';
        ?>
        <div class="carousel-item item<?php echo $item_count + 1; ?> <?php echo $active_class; ?>">
            
                <div class="w3l-space-banner">
                    <img src="./images/<?php echo $row_slider['slider_image']; ?>" alt="" width="100%">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>
                            <?php echo $row_slider['slider_caption']; ?>
                        </p>
                    </div>
                </div>
            
        </div>
        <?php 
                $item_count++;
            }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>