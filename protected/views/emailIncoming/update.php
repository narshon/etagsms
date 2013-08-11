<?php
$this->breadcrumbs=array(
	'Email Incomings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List EmailIncoming', 'url'=>array('index')),
	//array('label'=>'Add EmailIncoming', 'url'=>array("automated/create",'view'=>'EmailIncoming_form')),
	//array('label'=>'Update EmailIncoming', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailIncoming', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailIncoming', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update EmailIncoming <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>