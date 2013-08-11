<?php
$this->breadcrumbs=array(
	'Kunena Messages Texts'=>array('index'),
	$model->mesid=>array('view','id'=>$model->mesid),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List KunenaMessagesText', 'url'=>array('index')),
	//array('label'=>'Add KunenaMessagesText', 'url'=>array("automated/create",'view'=>'KunenaMessagesText_form')),
	//array('label'=>'Update KunenaMessagesText', 'url'=>array('update', 'id'=>$model->mesid)),
	array('label'=>'Delete KunenaMessagesText', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mesid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaMessagesText', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update KunenaMessagesText <?php echo $model->mesid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>