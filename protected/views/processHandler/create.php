<?php
$this->breadcrumbs=array(
	'Process Handlers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProcessHandler', 'url'=>array('index')),
	array('label'=>'Manage ProcessHandler', 'url'=>array('admin')),
);
?>

<h1>Create ProcessHandler</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>