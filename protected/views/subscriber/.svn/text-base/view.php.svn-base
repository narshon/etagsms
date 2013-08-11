<?php

$user = Users::model()->findByPk($model->user_id);
if($user){
    $update_url = Yii::app()->createAbsoluteUrl("automated/create",array('view'=>'SmsOutgoing_monocast','token'=>$this->id));
    $update = CHtml::link('Send Message',"#hybrid", array('onClick'=>"ajaxFormSubmit('$update_url','user-details');"));
    
    $url = Yii::app()->createAbsoluteUrl("automated/update",array('view'=>'Users_edit', 'id'=>$user->id));  //
    $link = CHtml::link("Edit",'#',array('onClick'=>"ajaxFormSubmit('$url','user-details');"));
     
            
    echo "<div id='user-details' class='view'>";
    echo "<div style='float:right'> $link </div>";
    echo "<p> Username: {$user->username}  &nbsp;&nbsp;&nbsp;&nbsp; Name(s): $user->name1  $user->name2  $user->name3  &nbsp;&nbsp;&nbsp;&nbsp; Date Added: $user->date_added</p>";
    echo "<p> Phone: {$user->phone}  &nbsp;&nbsp;&nbsp;&nbsp; Email: $user->email   </p>";
    echo "<p> Address: {$user->address}   </p>";
    echo "</div>";
}
$this->service=new ServiceComponent($this,"Subscriber");
// details view
//$this->service->showDetailView("","Subscriber_detail",$model->id);

?>
