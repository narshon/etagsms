<?php
$this->breadcrumbs=array(
	'Sms Incomings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SmsIncoming', 'url'=>array('index')),
	array('label'=>'Manage SmsIncoming', 'url'=>array('admin')),
);
?>

<h1>Create SmsIncoming</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>