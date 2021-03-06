<?php
$this->breadcrumbs=array(
	'Sms Outgoings'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"SmsOutgoing");
$this->service->showHybridGridView("Manage Sms Outgoings","SmsOutgoing_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add SmsOutgoing', 
          'url'=>array("automated/create",
                        'view'=>'SmsOutgoing_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Sms Outgoings', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'SmsOutgoing-dialog-id',
    'options'=>array(
        'title'=>'Create Grades',
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
      $( '#SmsOutgoing-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'SmsOutgoing_form','SmsOutgoing-dialog-id' );
      $( '#SmsOutgoing-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



