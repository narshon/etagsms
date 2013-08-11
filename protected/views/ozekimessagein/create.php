<?php
$this->breadcrumbs=array(
	'Ozekimessageins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ozekimessagein', 'url'=>array('index')),
	array('label'=>'Manage Ozekimessagein', 'url'=>array('admin')),
);
?>

<h1>Create Ozekimessagein</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>