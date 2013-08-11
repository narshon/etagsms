<?php
$this->breadcrumbs=array(
	'Kunena Messages',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add KunenaMessages', 'url'=>array("automated/create",'view'=>'KunenaMessages_form')),
	array('label'=>'Manage KunenaMessages', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> KunenaMessages Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"KunenaMessages");
$this->service->showListView($criteria,"KunenaMessages_list",$title);


?>
