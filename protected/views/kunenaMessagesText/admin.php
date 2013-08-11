<?php
$this->breadcrumbs=array(
	'Kunena Messages Texts'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"KunenaMessagesText");
$this->service->showHybridGridView("Manage Kunena Messages Texts","KunenaMessagesText_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add KunenaMessagesText', 
          'url'=>array("automated/create",
                        'view'=>'KunenaMessagesText_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Kunena Messages Texts', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'KunenaMessagesText-dialog-id',
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
      $( '#KunenaMessagesText-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'KunenaMessagesText_form','KunenaMessagesText-dialog-id' );
      $( '#KunenaMessagesText-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



