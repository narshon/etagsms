<h3> <?php  
$campaign_id=Yii::app()->session->get('current_campaign'); 
echo Definition::showCampaignTitle(); 

?></h3>

<div id="outerviewdiv2" style="margin:5px; padding: 0px; clear:both;">
        <div id="expand2" class="view portlet-decoration" style='float:left; margin-top: 0px; border-left: 5px solid #314D8C; color: #ffffff;'> <a href="#" onClick="showDiv('incoming-sms-stream','expand2','Incoming SMS Stream');" > - </a></div>
        <?php
        print '<div id="incoming-sms-stream" class="view">';
          //incoming-sms-stream
         $title = "Incoming SMS Stream";
        $this->renderPartial('../contentIn/admin',(array('campaign_id'=>$campaign_id,'title'=>$title,'channel'=>'sms')),false,true);
        print  "</div>";
        ?> 
</div><br/> 
<div id="outerviewdiv3" style="margin:5px; padding: 0px; clear:both;">
        <div id="expand3" class="view portlet-decoration" style='float:left; margin-top: 0px; border-left: 5px solid #314D8C; color: #ffffff;'> <a href="#" onClick="showDiv('outgoing-sms-stream','expand3','Outgoing SMS Stream');" > - </a></div>
        <?php
        $title = "Outgoing SMS Stream";
        print '<div id="outgoing-sms-stream" class="view">';
          //incoming-sms-stream
        $this->renderPartial('//contentOut/admin',(array('campaign_id'=>$campaign_id,'title'=>$title,'channel'=>'sms')),false,true);
        print  "</div>";
        ?> 
</div><br/> 
<!--
<div id="outerviewdiv4" style="margin:5px; padding: 0px; clear:both;">
        <div id="expand4" class="view portlet-decoration" style='float:left; margin-top: 0px; border-left: 5px solid #314D8C; color: #ffffff;'> <a href="#" onClick="showDiv('incoming-email-stream','expand4','Incoming Email Stream');" > - </a></div>
        <?php
        print '<div id="incoming-email-stream" class="view">';
          //incoming-sms-stream
       // $this->renderPartial('//contentIn/admin',(array('campaign_id'=>$campaign_id,'channel'=>'email')),false,true);
        print  "</div>";
        ?> 
</div><br/> 
<div id="outerviewdiv5" style="margin:5px; padding: 0px; clear:both;">
        <div id="expand5" class="view portlet-decoration" style='float:left; margin-top: 0px; border-left: 5px solid #314D8C; color: #ffffff;'> <a href="#" onClick="showDiv('outgoing-email-stream','expand5','Outgoing Email Stream');" > - </a></div>
        <?php
        print '<div id="outgoing-email-stream" class="view">';
          //incoming-sms-stream
       // $this->renderPartial('//contentOut/admin',(array('campaign_id'=>$campaign_id,'channel'=>'email')),false,true);
        print  "</div>";
        ?> 
</div><br/> 
-->

<script type="text/javascript">
 $(document).ready(function(){
     showDiv("incoming-sms-stream","expand2","Incoming SMS Stream");
     showDiv("outgoing-sms-stream","expand3","Outgoing SMS Stream");
     showDiv("incoming-email-stream","expand4","Incoming Email Stream");
     showDiv("outgoing-email-stream","expand5","Outgoing Email Stream");
 });
  

</script>