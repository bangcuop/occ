<h2>Admin</h2>
<ul id="listManager">

	<li><?php echo CHtml::link(CHtml::encode("Product Manager"), array('product/admin'));?></li>
	<li><?php echo CHtml::link(CHtml::encode("Service Manager"), array('service/admin'));?></li>
	<li><?php echo CHtml::link(CHtml::encode("Customer Manager"), array('customer/admin'));?></li>
	<li><?php echo CHtml::link(CHtml::encode("Images Manager"), array('image/admin'));?></li>

</ul>