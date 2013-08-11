<?php
$this->breadcrumbs=array(
	'Ozekimessageouts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ozekimessageout', 'url'=>array('index')),
	array('label'=>'Manage Ozekimessageout', 'url'=>array('admin')),
);
?>

<h1>Create Ozekimessageout</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>