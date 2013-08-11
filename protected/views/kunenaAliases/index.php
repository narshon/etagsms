<?php
$this->breadcrumbs=array(
	'Kunena Aliases',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add KunenaAliases', 'url'=>array("automated/create",'view'=>'KunenaAliases_form')),
	array('label'=>'Manage KunenaAliases', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> KunenaAliases Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 //$criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"KunenaAliases");
$this->service->showListView($criteria,"KunenaAliases_list",$title);


?>
