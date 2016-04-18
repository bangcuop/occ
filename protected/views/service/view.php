<?php
/* @var $this ServiceController */
/* @var $model Service */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->breadcrumbs = array(
    'Services' => array('index'),
    $model->serviceName,
);
?>
<div class="leftSpace"></div>
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
                <span class="title"><?php echo CHtml::link(CHtml::encode($d->productName), array('product/view', 'id' => $d->productId)); ?></span> </br>
                Department of Science and
                Technology of Gia Lai
                Ho tieu Chu Se Brrading system
            </div>
        </div>

        <?php
    }
    ?>
</div>
