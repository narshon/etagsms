<?php
if($this->beginCache("definition_admin", array('varyByExpression'=>"Definition::model()->getCacheExpression($model_id)"))) {

$filter = array('id'=>$model_id);
$this->service=new ServiceComponent($this,"Definition");
$this->service->showHybridGridView("","Definition_hybridgrid",$filter);

$this->endCache(); }

?>