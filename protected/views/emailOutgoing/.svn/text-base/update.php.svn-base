<?php
$this->breadcrumbs=array(
	'Email Outgoings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List EmailOutgoing', 'url'=>array('index')),
	//array('label'=>'Add EmailOutgoing', 'url'=>array("automated/create",'view'=>'EmailOutgoing_form')),
	//array('label'=>'Update EmailOutgoing', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailOutgoing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailOutgoing', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update EmailOutgoing <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>