<?php
$this->breadcrumbs=array(
	'Messageins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Messagein', 'url'=>array('index')),
	array('label'=>'Manage Messagein', 'url'=>array('admin')),
);
?>

<h1>Create Messagein</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>