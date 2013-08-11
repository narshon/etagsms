<?php
$this->breadcrumbs=array(
	'Mal Slides'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"MalSlide");
$this->service->showGridView("Malaria Slides","MalSlide_grid");


//show portlets for this service

$this->portlet[]=array(
    array(
          'label'=>'Add MalSlide', 
          'url'=>array("automated/create",
                        'view'=>'MalSlide_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')), 
           
    array('label'=>'List Malaria Slides', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'MalSlide-dialog-id',
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
      $( '#MalSlide-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'MalSlide_form','MalSlide-dialog-id' );
      $( '#MalSlide-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



<?php //editable grid view 
 /*
print "<h3 style='text-align:center'> MalSlide Editable Grid </h3>";

$this->widget('ext.CEditableGridView.CEditableGridView', array(
     'dataProvider'=>$model->search(),
     'showQuickBar'=>'true',
     'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
     'quickUpdateAction'=>'QuickUpdate',
     'summaryText'=>'',
     'displayOptions'=>array('width'=>100,'size'=>10),
     'modelName'=>'MalSlide',
     'template'=>'{items}', 
     'columns'=>array(
           array('header' => 'Date Add', 'name' => 'date_add', 'class' => 'CEditableColumn'),        // display the 'title' attribute
           array('header' => 'rbc', 'name' => 'rbc', 'class' => 'CEditableColumn'),
           array('header' => 'wbc', 'name' => 'wbc', 'class' => 'CEditableColumn'),
           array('header' => 'hgb', 'name' => 'hgb', 'class' => 'CMonkColumn'),
     )));
  * 
  */
?>


