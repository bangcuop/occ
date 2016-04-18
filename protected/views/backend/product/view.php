<?php
/* @var $this ProductController */
/* @var $model Product */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('product', 'manage_product'), 'url' => array('admin')),
    array('label' => Yii::t('product', 'update_product'), 'url' => array('update', 'id' => $model->productId)),
);
?>
<h1><?php echo Yii::t('product', 'view_product') ?></h1>
<!-- 	Duy  -->
<link rel="stylesheet" type="text/css" href="css/slide.css" />
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript">
    $('#slider').cycle({
        fx: 'scrollHorz',
        speed: 'slow',
        timeout: 5000,
        next: '#next',
        prev: '#prev',
        before: onBefore,
        pager: '#slider-nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return selector string for existing anchor 
            return '#slider-nav li:eq(' + idx + ') a';
        }
    });
    function onBefore() {
        $('#list-image-small li').css('border', '1px solid #777');
        $('#list-image-small li[name=li_image' + this.id + ']').css('border', '1px solid #EA7039');
        //$('input[name=content_li_removed]').val($('#list-image-small li[name=li_image'+this.id+']').html());
    }
</script>
<!-- End Duy  -->

<!--<div class="leftSpace"></div>-->
<div class="columnLeft">
    <div id="product_slide">
        <div id="slide_up">
            <h1><?php echo $model->productName; ?></h1>
            <div id=container_slide>
                <div class="controller_slide" id="prev"></div>
                <div id="slider">
                    <?php
                    $rows = array();
                    foreach ($listImage as $row) {
                        $rows[] = $row;
                        echo "<img id = " . $row['imageId'] . "  src=" . $row['imageUrl'] . ">";
                    }
                    ?>
                </div>
                <div class="controller_slide" id="next"></div>
            </div>
        </div>
        <div id="slide_down">
            <input type="hidden" name="content_li_removed" value="">
            <ul id="slider-nav">
                <?php
                $i = 0;
                foreach ($listImage as $row) {
                    $i++;
                    echo "<li>";
                    echo "<a href='#'><img class='image_small' src=" . $row['imageUrl'] . " alt=''" . "></a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
