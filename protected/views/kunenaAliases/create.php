<?php
$this->breadcrumbs=array(
	'Kunena Aliases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KunenaAliases', 'url'=>array('index')),
	array('label'=>'Manage KunenaAliases', 'url'=>array('admin')),
);
?>

<h1>Create KunenaAliases</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>