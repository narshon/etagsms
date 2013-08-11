
//Document.Ready - Start of jquery execution
$(document).ready(function(){
    bothChangeAndLoadEvents('Subscriber','org','user_id',1,'==','','','');
    bothChangeAndLoadEvents('Subscriber','org','org_group',0,'==','','','');
    bothChangeAndLoadEvents('Subscriber','org','org_campaign',1,'==','','','');
    
    bothChangeAndLoadEvents('Subscriber','org_campaign','org',0,'>','','','');
    bothChangeAndLoadEvents('Subscriber','org_campaign','user_id',0,'>','','','');
    
});