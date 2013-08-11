<?php
$this->breadcrumbs=array(
	'Subscribers'=>array('index'),
	'Manage',
);
if(isset($group_id)){
  $filter = array('service_id'=>$model_id,'group_id'=>$group_id);  
}
else{
  $filter = array('service_id'=>$model_id);  
}

$this->service=new ServiceComponent($this,"Subscriber");
$this->service->showHybridGridView("Manage Subscribers","Subscriber_hybridgrid",$filter);

