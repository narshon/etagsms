<?php
$this->breadcrumbs=array(
	'Messagelogs',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Messagelog', 'url'=>array("automated/create",'view'=>'Messagelog_form')),
	array('label'=>'Manage Messagelog', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Messagelog Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Messagelog");
$this->service->showListView($criteria,"Messagelog_list",$title);


?>
