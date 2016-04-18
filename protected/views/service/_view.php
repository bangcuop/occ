<?php
/* @var $this ServiceController */
/* @var $data Service */
?>

<li>
	<?php echo CHtml::link(CHtml::encode($data->serviceName), array('view', 'id'=>$data->serviceId)); ?> 
</li>