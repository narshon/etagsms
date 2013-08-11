<?php
$this->breadcrumbs=array(
	'Messagelogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Messagelog', 'url'=>array('index')),
	array('label'=>'Manage Messagelog', 'url'=>array('admin')),
);
?>

<h1>Create Messagelog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>