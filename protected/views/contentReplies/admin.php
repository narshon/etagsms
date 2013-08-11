<?php
$this->breadcrumbs=array(
	'Content Replies'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"ContentReplies");
$this->service->showHybridGridView("Manage Content Replies","ContentReplies_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add ContentReplies', 
          'url'=>array("automated/create",
                        'view'=>'ContentReplies_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Content Replies', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ContentReplies-dialog-id',
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
      $( '#ContentReplies-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ContentReplies_form','ContentReplies-dialog-id' );
      $( '#ContentReplies-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



