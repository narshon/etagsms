<?php 
// echo "tuko hapa"; exit;
//Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//Yii::app()->clientscript->scriptMap['jquery.yiiactiveform.js'] = false; 

$formArray = $sc->getAutomatedFormElements($model,$viewobject,$additional_params);
$form = new CMonkForm($formArray,$model);
?>
<div id="<?  echo $viewobject->other_params; ?>" class="form" style="margin-top: 20px;">
    <?php echo $form->render(); 
      //register css and js scripts for this view
       $sc->registerAssets($viewobject);
          
    ?>   
    
</div>




