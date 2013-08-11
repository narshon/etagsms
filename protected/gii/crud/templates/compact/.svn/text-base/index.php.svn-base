<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add <?php echo $this->modelClass; ?>', 'url'=>array("automated/create",'view'=>'<?php echo $this->modelClass; ?>_form')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1><?php // echo $label; ?></h1>

<?php echo "<?php\n";  ?>
//automated list view
 $title= '<p><h3> <?php echo $this->modelClass." Listings" ?> </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"<?php echo $this->modelClass; ?>");
$this->service->showListView($criteria,"<?php echo $this->modelClass; ?>_list",$title);


?>
