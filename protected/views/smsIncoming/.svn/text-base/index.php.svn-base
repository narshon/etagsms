<?php
$this->breadcrumbs=array(
	'Sms Incomings',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add SmsIncoming', 'url'=>array("automated/create",'view'=>'SmsIncoming_form')),
	array('label'=>'Manage SmsIncoming', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> SmsIncoming Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"SmsIncoming");
$this->service->showListView($criteria,"SmsIncoming_list",$title);


?>
