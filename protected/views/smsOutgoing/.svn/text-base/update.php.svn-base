<?php
$this->breadcrumbs=array(
	'Sms Outgoings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List SmsOutgoing', 'url'=>array('index')),
	//array('label'=>'Add SmsOutgoing', 'url'=>array("automated/create",'view'=>'SmsOutgoing_form')),
	//array('label'=>'Update SmsOutgoing', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SmsOutgoing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SmsOutgoing', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update SmsOutgoing <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>