
<div class="leftSpace"></div>
<div id="product_bar">
	<span class="style1">
		<a class="" href="#">Thiết kế Thương hiệu</a>
	</span>
	<span class="style1" style="padding-left: 10px;">
		<a class="" href="#">Thiết kế Thương hiệu</a>
	</span>
</div>
<div id="product_slide">
	<div id="slide_up">
		<div id=container_slide>
			<div class="controller_slide" id="prev"></div>
				<div id="slider">
				<?php
					$rows = array();
					foreach ($listImage as $row)
					{
						$rows[] = $row;
						echo "<img id = ".$row['imageId']."  src=".$row['imageUrl'].">";
					}
				?>
				</div>
			<div class="controller_slide" id="next"></div>
		</div>
	</div>
</div>
<div id="content_right">
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	<a class="style1" style="float: left;" href="#">Tổng công ty thương mại Hà Nội Hapro </a>
	
</div>
<div id="slide_down">
	<input type="hidden" name="content_li_removed" value="">
	<ul id="list-image-small" class="slide_image_small">
		<?php 
			foreach ($listImage as $row){
				echo "<li name="."li_image".$row['imageId']." style="."float:left".">";
				echo "<img class="."image_small"." src=".$row['imageUrl']." alt="."".">";
				echo "</li>";
			}
		?>
	</ul>
</div>