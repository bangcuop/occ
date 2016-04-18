<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvvD_qAhTYGPUtHAuq58cwe6J0shJJkZI&sensor=false">
</script>
<script>
    var myCenter = new google.maps.LatLng(21.019978109671193, 105.8179521560669);
    function initialize()
    {
        var mapProp = {
            center: myCenter,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="leftSpace"></div>
<div id="contact_menu">
    <?php if (Yii::app()->user->hasFlash('contact')): ?>

        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
    <?php else: ?>
        <?php
        SiteController::loadLanguage();
        ?>
        <div class="title"><?php echo Yii::t('contact', 'title'); ?>:</div>
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'contact-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true
                )
            ));
            ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('size' => 82, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'address'); ?>
                <?php echo $form->textField($model, 'address', array('size' => 82, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'address'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 82, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'phone'); ?>
                <?php echo $form->textField($model, 'phone', array('size' => 82, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'phone'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'subject'); ?>
                <?php echo $form->textField($model, 'subject', array('size' => 82, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'subject'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'body'); ?>
                <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 62)); ?>
                <?php echo $form->error($model, 'body'); ?>
            </div>
            <?php if (CCaptcha::checkRequirements()): ?>
                <div class="row">
                    <div class="captcha_left">
                        <?php echo $form->labelEx($model, 'verifyCode', array('style' => 'float: left;padding-top: 10px;padding-right: 10px')); ?>
                        <?php echo $form->textField($model, 'verifyCode', array('size' => 15, 'style' => 'float: left')); ?>
                        <div class="captcha_image">
                            <?php $this->widget('CCaptcha', array('buttonLabel' => CHtml::image('images/refret.png'))); ?>
                        </div>
                    </div>
                    <div class="captcha_right">
                        <?php echo CHtml::resetButton('reset', array('style' => 'background-image: url("images/bt_nl.jpg"); float: left')); ?>
                        <?php echo CHtml::submitButton('Submit', array('style' => 'background-image: url("images/bt_g.jpg"); float: right')); ?>
                    </div>
                    <?php echo $form->error($model, 'verifyCode', array('style' => 'width: 100%;float: left;')); ?>
                </div>
            <?php endif; ?>
            <?php $this->endWidget(); ?>

        </div>
        <!-- form -->

    <?php endif; ?>
</div>
<div id="contact_right">
    <span class="style7"><?php echo Yii::t('contact', 'string0001') ?></span></br>
    <span class="style7"><?php echo Yii::t('contact', 'string0002') ?></span></br>
    <span style="color: #000;"><?php echo Yii::t('contact', 'string0003') ?><br/>
        <?php echo Yii::t('contact', 'string0004') ?></span></br>
    <span class="style7"><?php echo Yii::t('contact', 'string0005') ?>:</span></br>
    <span class="style8">a:</span> <?php echo Yii::t('contact', 'string0006') ?></br>
    <span class="style8">t:</span> 84.4. 37712153</br>
    <span class="style8">e:</span> occvietnam@gmail.com</br>
    <span class="style8">w:</span> www.occ.com.vn | www.occ.vn</br></br>
    <span style="color: #000;"><?php echo Yii::t('contact', 'string0007') ?>:</span></br>
    <div id="googleMap" style="width: 180px;height: 275px;">
    </div>
</div>