<?php
$this->breadcrumbs=array(
	'Content Ins'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"ContentIn");
$filter=array();  
//get incoming sms filter
if($channel=='sms'){
$filter=ContentIn::getSMSfilter($campaign_id);

$this->service->showHybridGridView($title,"ContentIn_hybridgrid",$filter);
}
if($channel=='email'){
$filter=ContentIn::getEmailfilter($campaign_id);
$this->service->showHybridGridView("Incoming ".ucfirst($channel)." Stream","ContentIn_emailgrid",$filter);
}


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ContentIn-dialog-id',
    'options'=>array(
        'title'=>Definition::model()->showCampaignTitle(),
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>340,
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
      $( '#ContentIn-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ContentIn_form','ContentIn-dialog-id' );
      $( '#ContentIn-dialog-id' )
        .dialog( { } )
        .dialog( 'open' );
    });
});

</script>



