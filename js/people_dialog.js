
//Document.Ready - Start of jquery execution
$(document).ready(function(){
    //alert($("#Worklist_fw_date").val());
    //fw_ini_check_div
    if($("#Worklist_ajax_validation").val()==0 || $("#Worklist_fw_ini").val()==''){
        $("div#fw_ini_check_div").hide();
    }
    if($("#Worklist_ajax_validation").val()==0 || $("#Worklist_fw_date").val()=='' ){
        $("div#fw_date_check_div").hide();
    }
    bothOnloadAndCheckEvent("Worklist","check_change_hm","change_hm_head",0,"");
   
     
});

