<?php
$this->breadcrumbs=array(
	'Kunena Messages Texts',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add KunenaMessagesText', 'url'=>array("automated/create",'view'=>'KunenaMessagesText_form')),
	array('label'=>'Manage KunenaMessagesText', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> KunenaMessagesText Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"KunenaMessagesText");
$this->service->showListView($criteria,"KunenaMessagesText_list",$title);


?>
