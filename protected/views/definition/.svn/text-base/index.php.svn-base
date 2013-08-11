
<h3> <?php echo Definition::showCampaignTitle(); ?></h3>

<div class="outerviewdiv1" style="margin:2px;">
<div id="expand1" class="portlet-decoration view" style='float:left; border-left: 5px solid #314D8C; color: #ffffff;'> <a href="#" onClick="showDiv('tabbed-layoutpane1','expand1','Campaign Management');" > - </a></div> 
       <div id="tabbed-layoutpane1" style="width:95%; padding:5px; clear:both;" >
        <!-- Tabs here -->
        <?php
           $campaign_id=Yii::app()->session->get('current_campaign');
           $tabs = Definition::model()->getViewTabs($this, $campaign_id);
           $this->service->showTabView($tabs, 'view-tabs');
        ?>
        </div>
</div>

<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Definition-dialog-id',
    'options'=>array(
        'title'=>Definition::model()->showCampaignTitle(),
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));


?>
<div class="divForForm"></div>

<?php
  $this->endWidget();  ?>


<script type="text/javascript">
jQuery( function($){
    $( 'a.update-dialog-create' ).bind( 'click', function( e ){
      e.preventDefault();
      $( '#Definition-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Definition_form','Definition-dialog-id' );
      $( '#Definition-dialog-id' )
        .dialog( 'open' );
    });
});

</script>
