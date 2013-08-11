<?php

$formArray = $sc->getAutomatedFormElements($model,$viewobject,$additional_params);
$form = new CMonkForm($formArray,$model);
?>
<div id="<?  echo $viewobject->other_params; ?>" class="wide form" style="margin-top: 20px;">
    
    <?php //echo $form->render(); 
       echo $form->renderBegin();
       
       echo "<div> <h3> Generate a list of homesteads to enumerate </h3> </div>";
       foreach($form->getElements() as $element)
            echo "<div class='element' style='float:left;'>".$element->render()." </div>";
       
        foreach($form->getButtons() as $button)
            echo "<div class='button' style='float:left; margin-left:10px;'>".$button->render()." </div>";

       echo $form->renderEnd();
       
       
      //register css and js scripts for this view
       $sc->registerAssets($viewobject);
          
    ?>   
    
</div>
<div style="clear:both;"></div>
