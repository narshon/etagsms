<div style="float:right">
    <?php
        echo chtml::link("Import Users From CSV",Yii::app()->createUrl('automated/create',array('view'=>'Users_importcsv','token'=>'importcsv')));
    ?>
</div>
<?php
if($this->beginCache("processHandler_admin", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_users')))) {
    
$org_id=  Definition::model()->getOrganisationID();
$filter = array('t.fk_org_id'=>$org_id);
$this->service=new ServiceComponent($this,"Users");
$this->service->showHybridGridView(" Manage Users","Users_manageusers", $filter);

$this->service=new ServiceComponent($this,"Group");
$this->service->showHybridGridView(" Manage Groups","Group_hybridgrid", $filter);

$this->endCache(); }


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Definition-dialog-id',
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
      $( '#Definition-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Definition_form','Definition-dialog-id' );
      $( '#Definition-dialog-id' )
        .dialog( { } )
        .dialog( 'open' );
    });
});

</script>

