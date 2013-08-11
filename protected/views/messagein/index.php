<?php
$this->breadcrumbs=array(
	'Messageins',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Messagein', 'url'=>array("automated/create",'view'=>'Messagein_form')),
	array('label'=>'Manage Messagein', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Messagein Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Messagein");
$this->service->showListView($criteria,"Messagein_list",$title);


?>
