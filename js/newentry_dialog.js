//Document.Ready - Start of jquery execution
$(document).ready(function(){
    
    //fw_ini_check_div
    if($("#NewEntry_ajax_validation").val()==0 || $("#NewEntry_fw_ini").val()=='' ){
        $("div#fw_ini_check_div").hide();
    }
    if($("#NewEntry_ajax_validation").val()==0 || $("#NewEntry_date_obs").val()=='' ){
        $("div#fw_date_check_div").hide();
    }
    if($("#NewEntry_ajax_validation").val()==0 || $("#NewEntry_page").val()=='' ){
        $("div#fw_page_check_div").hide();
    }
   
     
});
