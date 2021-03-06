<?php
/* @var $this ProductController */
/* @var $data Product */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
?>
<?php
if (!empty($data->image)) {
    $image = $data->image;
} else {
    $image = "images/noimage.jpg";
}
?>
<div class="productItem">
    <div class="imageBox">
        <?php echo CHtml::image($image, "", array('width' => 175, 'height' => 130)); ?>
    </div>
    <div class="desBox">
        <span class="title"><?php echo CHtml::link(CHtml::encode($data->productName), array('view', 'id' => $data->productId)); ?></span> </br>
        Department of Science and
        Technology of Gia Lai
        Ho tieu Chu Se Brrading system
    </div>
</div>