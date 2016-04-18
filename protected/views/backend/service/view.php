<?php
/* @var $this ServiceController */
/* @var $model Service */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('services', 'manage_services'), 'url' => array('admin')),
);
?>
<h1><?php echo Yii::t('services', 'view_services') ?></h1>
<div class="listProducts">
    <?php
    $list = Product::model()->findAll("serviceId=" . $model->serviceId);
    foreach ($list as $d) {
        if (!empty($d->image)) {
            $image = $d->image;
        } else {
            $image = "images/noimage.jpg";
        }
        ?>

        <div class="productItem">
            <div class="imageBox">
                <?php echo CHtml::image($image, "", array('width' => 170, 'height' => 130)); ?>
            </div>
            <div class="desBox">
                <span class="title"><?php echo CHtml::link(CHtml::encode($d->productName), array('product/update', 'id' => $d->productId)); ?></span> </br>
                Department of Science and
                Technology of Gia Lai
                Ho tieu Chu Se Brrading system
            </div>
        </div>

        <?php
    }
    ?>
</div>
