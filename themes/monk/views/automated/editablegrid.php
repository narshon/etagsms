<?php 
 $authorizer = new AuthorizationComponent;
 if($authorizer->authorize($viewID->id, "edit")){
   
//editable grid view 
 
$this->widget('ext.CEditableGridView.CEditableGridView', array(
     'dataProvider'=>$model->search($filter),
     'showQuickBar'=>'true',
     'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
     'quickUpdateAction'=>'QuickUpdate',
     'summaryText'=>'',
     'modelName'=>$viewID->view_model,
     'template'=>'{items}', 
     'columns'=>$this->service->gridData($viewID->id,$viewID->view_model)));

 }
?>