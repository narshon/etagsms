<?php
$this->breadcrumbs=array(
	'Content Outs'=>array('index'),
	'Manage',
);

$filter=array();  
$this->service=new ServiceComponent($this,"ContentOut");
//get incoming sms filter
if($channel=='sms'){
 if(isset($status))    
   $filter=ContentOut::getSMSfilter($campaign_id,$status);
 else 
    $filter=ContentOut::getSMSfilter($campaign_id);
$this->service->showHybridGridView($title,"ContentOut_hybridgrid",$filter);
}
if($channel=='email'){
$filter=ContentOut::getEmailfilter($campaign_id);
$this->service->showHybridGridView("Outgoing ".ucfirst($channel)." Stream","ContentOut_emailgrid",$filter);
}



$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ContentOut-dialog-id',
    'options'=>array(
        'title'=>Definition::model()->showCampaignTitle(),
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>350,
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
      $( '#ContentOut-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ContentOut_form','ContentOut-dialog-id' );
      $( '#ContentOut-dialog-id' )
        .dialog( 'open' );
    });
});

</script>



