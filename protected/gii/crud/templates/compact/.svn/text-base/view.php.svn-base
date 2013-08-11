<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	//array('label'=>'Add <?php echo $this->modelClass; ?>', 'url'=>array("automated/create", 'view'=>'<?php echo $this->modelClass; ?>_form')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('automated/update', 'view'=>'<?php echo $this->modelClass; ?>_form', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"<?php echo $this->modelClass; ?>");
// details view
$this->service->showDetailView("<?php echo $this->modelClass; ?> Details","<?php echo $this->modelClass; ?>_detail",<?php echo "\$model->{$this->tableSchema->primaryKey}"; ?>);

?>
