<div class="leftSpace"></div>
<?php
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
?>
<?php $list = CHtml::listData(Customer::model()->findAll(array('limit'=>4)), 'customerId', 'customerName'); 
foreach ($list as $k=>$v){
?>
<div class="productBox box<?php echo $k;?>">
	<div class="customer"><?php echo CHtml::link(CHtml::encode($v), array('customer/view', 'id'=>$k));?></div>
	<div class="up"><?php echo CHtml::image("images/arrow.png");?></div>
	<div class="customerBox">
		<ul>
		<?php 
		$dataP = Product::model()->findAll("customerId=".$k);
		foreach ($dataP as $d){
			if(!empty($d->image)){
				$image = $d->image;
			}
			else {
				$image = "images/noimage.jpg";
			}
			?>
			<li class="productItem">
				<?php echo CHtml::link(CHtml::image($image,"",array('width'=>170,'height'=>130)), array('view', 'id'=>$d->productId));?></br>
				<div class="info">
				<?php echo CHtml::link(CHtml::encode($d->productName), array('view', 'id'=>$d->productId));?> </br>
				<?php echo CHtml::link(CHtml::encode($d->description), array('view', 'id'=>$d->productId));?>
				</div>
			</li>
			<?php 
		}
		 ?>
		</ul>
	</div>
	<div class="down"><?php echo CHtml::image("images/arrow1.png");?></div>
</div>
<?php 
if (count($dataP) > 2) 
{
?>
<script type="text/javascript">
    $(".box<?php echo $k;?> .customerBox").jCarouselLite({
        btnNext: ".box<?php echo $k;?> .up",
        btnPrev: ".box<?php echo $k;?> .down",
		vertical: true
    }); 	
</script> 
<?php 
}?> 
<?php 
}?>