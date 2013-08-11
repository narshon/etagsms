<?php
$this->breadcrumbs=array(
	'Sms Outgoings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SmsOutgoing', 'url'=>array('index')),
	array('label'=>'Manage SmsOutgoing', 'url'=>array('admin')),
);
?>

<h1>Create SmsOutgoing</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>