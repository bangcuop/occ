<?php
/* @var $this ServiceController */
/* @var $data Service */
?>

<div class="productItem">
	<div class="imageBox">
		<?php echo CHtml::image("images/amh1.jpg","",array('width'=>175,'height'=>130));?>
	</div>
	<div class="desBox">
		<span class="title"><?php echo CHtml::link(CHtml::encode($data->productName), array('view', 'id'=>$data->productId));?></span> </br>
		Department of Science and
		Technology of Gia Lai
		Ho tieu Chu Se Brrading system
	</div>
</div>