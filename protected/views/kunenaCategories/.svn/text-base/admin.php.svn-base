<?php
$this->breadcrumbs=array(
	'Kunena Categories'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"KunenaCategories", Yii::app()->params['other_db']['db_name']);
$this->service->showHybridGridView("Manage Kunena Categories","KunenaCategories_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add KunenaCategories', 
          'url'=>array("automated/create",
                        'view'=>'KunenaCategories_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Kunena Categories', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'KunenaCategories-dialog-id',
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
      $( '#KunenaCategories-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'KunenaCategories_form','KunenaCategories-dialog-id' );
      $( '#KunenaCategories-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



