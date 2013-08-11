/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    populateGroups();
});

$('#Broadcast_broadcast_groups').change(function (){
      populateGroups();
});

function populateGroups(){
      //call universal GET request to pull ez details
      url=$('#Broadcast_url_holder').val();
      string = 'group:'+$('#Broadcast_broadcast_groups').val()+',broadcast_id:'+$('#Broadcast_broadcast_id').val(); 
      ajaxUniversalGetRequest(url,'myajaxflash',string);
     
}


