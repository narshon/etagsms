<?php
$this->breadcrumbs=array(
	'Email Outgoings'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"EmailOutgoing");
$this->service->showHybridGridView("Outgoing Email Stream","EmailOutgoing_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add EmailOutgoing', 
          'url'=>array("automated/create",
                        'view'=>'EmailOutgoing_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Email Outgoings', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'EmailOutgoing-dialog-id',
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
      $( '#EmailOutgoing-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'EmailOutgoing_form','EmailOutgoing-dialog-id' );
      $( '#EmailOutgoing-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



