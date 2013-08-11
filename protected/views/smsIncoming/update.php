<?php
$this->breadcrumbs=array(
	'Sms Incomings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List SmsIncoming', 'url'=>array('index')),
	//array('label'=>'Add SmsIncoming', 'url'=>array("automated/create",'view'=>'SmsIncoming_form')),
	//array('label'=>'Update SmsIncoming', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SmsIncoming', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SmsIncoming', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update SmsIncoming <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>