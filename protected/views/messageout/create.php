<?php
$this->breadcrumbs=array(
	'Messageouts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Messageout', 'url'=>array('index')),
	array('label'=>'Manage Messageout', 'url'=>array('admin')),
);
?>

<h1>Create Messageout</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>