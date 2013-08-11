<?php
$this->breadcrumbs=array(
	'Email Incomings'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"EmailIncoming");
$this->service->showHybridGridView("Incoming Email Stream","EmailIncoming_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add EmailIncoming', 
          'url'=>array("automated/create",
                        'view'=>'EmailIncoming_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Email Incomings', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'EmailIncoming-dialog-id',
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
      $( '#EmailIncoming-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'EmailIncoming_form','EmailIncoming-dialog-id' );
      $( '#EmailIncoming-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



