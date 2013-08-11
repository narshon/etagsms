<?php
$this->breadcrumbs=array(
	'Kunena Messages'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"KunenaMessages");
$this->service->showHybridGridView("Manage Kunena Messages","KunenaMessages_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add KunenaMessages', 
          'url'=>array("automated/create",
                        'view'=>'KunenaMessages_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Kunena Messages', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'KunenaMessages-dialog-id',
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
      $( '#KunenaMessages-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'KunenaMessages_form','KunenaMessages-dialog-id' );
      $( '#KunenaMessages-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



