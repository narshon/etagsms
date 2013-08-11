/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function showPortletText(contentdivid,headerdivid){
    //alert(contentdivid);
    $("div#"+contentdivid).show("slow"); 
    $("div#"+headerdivid).html("<a href='#' onClick='hidePortletText(\""+contentdivid+"\",\""+headerdivid+"\");'> - </a>");
}

function hidePortletText(contentdivid,headerdivid){
    //alert(contentdivid+" = ");
    $("div#"+contentdivid).hide("slow"); 
    $("div#"+headerdivid).html("<a href='#' onClick='showPortletText(\""+contentdivid+"\",\""+headerdivid+"\");'> + </a>");
}


function AJAX(){
	try{
	xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
	return xmlHttp;
	}
	catch (e){
	try{
		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		return xmlHttp;
	}
	  catch (e){
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				return xmlHttp;
		}
		 catch (e){
			alert("Your browser does not support AJAX.");
			return false;
				}
			}
		}
	}


function ajaxPush(serve,divid,messageTitle,messageCateg){
        // alert("Tuko hapa");
        message=msgText=$("#"+divid).val();
        changeTitle=$("#"+messageTitle).val();
        if(message!='' || changeTitle!=''){
            
       
         hs.htmlExpand(this, { 
			width: 400, creditsPosition: 'bottom left', 
			headingEval: 'this.a.title', wrapperClassName: 'titlebar', headingText: 'Sending Message', maincontentText: "Please Wait" } );
 
                   $.ajax({
			type: "GET",
			url: serve,
			data: {messageTitle:changeTitle, messageText:message, messageCateg:messageCateg,messageStatus:'pending'},
			beforeSend: function(x) {
                          
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
                       // alert("Sending");
			},
			dataType: "json",
			success: function(data){
			  // do stuff...
                          // alert("Success");
                         // window.location.refresh=successRedirection;
                       
			},
                         error: function (response, status) {
                          //  alert("Error! "+response+" "+status);
                        }

		});
                
         }
}


function sendData(url){
    
        view_name=$("#view_name").val();
        view_desc=$("#view_desc").val();
        status_=$("#status_").val();
        default_=$("#default_").val();
        view_model=$("#view_model").val();
        view_type=$("#view_type").val();
        view_gridid=$("#gridid").val();
        name_alias=$("#name_alias").val();

        
        var divid="wait";

             // Create xmlHttp
            var xmlHttpObject = AJAX();

            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                      
                           $("#view_name").val("");
                           $("#view_desc").val("");
                           $("#status_").val("");
                           $("#default_").val("");
                           $("#view_model").val("");
                           $("#view_type").val("");
                           $("#gridid").val("");
                           $("#name_alias").val("");
                           presHtml="<div style='float:left;width:100px;color:green'><b>"+view_name+"</b></div> <div style='float:left;width:100px;color:green'><b>"+name_alias+"</b></div> <div style='float:left;width:100px;color:green'><b>"+view_model+"</b></div> <div style='float:left;width:100px;color:green'><b>"+view_type+"</b></div> <div style='float:left;width:100px;color:green'><b>"+status_+"</b></div><div style='clear:left;'></div>";

                           $("#addpres_details").html($("#addpres_details").html()+presHtml);
                           
                           document.getElementById(divid).innerHTML=xmlHttpObject.responseText;

                    }
                    else {
                        document.getElementById(divid).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";
                    }
            }
           
            var parameters="&view_name="+view_name+"&view_desc="+view_desc+"&status_="+status_+"&default_="+default_+"&view_model="+view_model+"&view_type="+view_type+"&gridid="+view_gridid+"&name_alias="+name_alias;
             
            xmlHttpObject.open("GET", url+parameters, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(null);
       
}


function setDraggablePosition(url,dragdiv,dragvalue,dropdiv,dropvalue){
                
                 
                 var sourceDrop=dragdiv.split("_");
                 //alert(sourceDrop[1]);
                 $.ajax({
			type: "GET",
			url: url,
			data:{drag:dragdiv, drop:dropdiv, dragvalue:dragvalue, dropvalue:dropvalue},
			beforeSend: function(x) {  
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
			 },
			dataType: "json",
			success: function(data){
                             
                             // alert("dropvalue="+data.dropvalue+"dragvalue"+data.dragvalue+" moveddrop="+data.moved_drop);
			      $('#'+dropdiv).text(dragvalue);
                              $('#DropDiv_'+data.moved_drop).text(dropvalue);
		          },
                        error: function (response, status) {
                            alert("Error hapa! "+response+" "+status);
                        }
                    });
	          	
    
}


function getUpdateDialog(uri,form,dialog_id){
                  
             
              
                  $.ajax({
			type: "post",
			url:  uri,
			data: $("#"+form).serialize(),
                        dataType: "json",
			beforeSend: function(x) { 
                          $('#'+dialog_id+' div.divForForm').html("Please wait...");
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
                       
			},
			
			success: function(data){
                            
                            if (data.status == 'failure')
                            {
                                $('#'+dialog_id+' div.divForForm').html(data.div);
                                
                                $( '#'+dialog_id+' div.divForForm form input[type=submit]' )
                                    .die() // Stop from re-binding event handlers
                                    .live( 'click', function( e ){ // Send clicked button value
                                      e.preventDefault();
                                      getUpdateDialog(uri,form,dialog_id);   
                                  });
                                     
                                
                            }
                            else
                            {   
                                
                                $('#'+dialog_id+' div.divForForm').html(data.div);
                                if(data.redirect==1){
                                    //redirect main page.
                                    window.location=data.newpage;
                                }
                                $( 'div.grid-view' ).each( function(){ 
                                    $.fn.yiiGridView.update( $( this ).attr( 'id' ) );
                                });
                                setTimeout( $( '#'+dialog_id ).dialog( 'close' ).children( ':eq(0)' ).empty(), 5000 );
                               //setTimeout($('#Grades-dialog-id').dialog('close'),10000);
                            }
                       
			},
                         error: function (response, status) {
                            // alert("Error! "+response+" "+status);
                          $('#'+dialog_id+' div.divForForm').html("An error occured. ");
                        }

		});
         return false; 
}

function showService(uri,service_id,div,viewsdiv,portsdiv,viewdetailspane){
        
       
               $.ajax({
			type: "GET",
			url:  uri,
			data: {service_id:service_id},
                        dataType: "json",
			beforeSend: function(x) {
                          $('#'+div).html("Please wait...");
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
                       
			},
			
			success: function(data){
                             $('#'+div).html(data.text);
                             $('#'+viewsdiv).html(data.views);
                             $('#'+portsdiv).html(data.portlets);
                             $('#'+viewdetailspane).html(data.viewDetails);
			},
                         error: function (response, status) {
                           // alert("Error! "+response+" "+status);
                          $('#'+div).html("An error occured.");
                        }

		});
         return false; 
         
}

function showDefaultViewDetails(url,div,service_id){
    //raw ajax request to fetch UI widget that contains viewdetails.
             // Create xmlHttp
            var xmlHttpObject = AJAX();

            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                      
                       
                           document.getElementById(div).innerHTML=xmlHttpObject.responseText;

                    }
                    else {
                        document.getElementById(div).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";
                    }
            }
           
            var parameters="&service_id="+service_id;
             
            xmlHttpObject.open("GET", url+parameters, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(null);
 }
 
 function showAjaxServiceTabs(url,div,service_id, view_file){   
         
      // Create xmlHttp
            var xmlHttpObject = AJAX();

            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                      
                       document.getElementById(div).innerHTML=xmlHttpObject.responseText;

                    }
                    else {
                       document.getElementById(div).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";
                    }
            }
           
            var parameters="&service_id="+service_id+"&div="+div+"&view_file="+view_file;
             
            xmlHttpObject.open("GET", url+parameters, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(null);
 }

function showDiv(div,messageDiv,message){
    
    $("div#"+div).hide(); 
    $("div#"+messageDiv).html("<a href='#' onClick=\"hideDiv('"+div+"','"+messageDiv+"','"+message+"')\">+</a> "+message); 
    //$("div#"+div).text(""); 
    $("div#"+messageDiv).css("width","97.4%");
}
function hideDiv(div,messageDiv,message){
   
    $("div#"+div).show(); 
    $("div#"+messageDiv).html("<a href='#' onClick=\"showDiv('"+div+"','"+messageDiv+"','"+message+"')\">-</a>"); 
    $("div#"+messageDiv).css("width","");
    
}

function hyBridGrid(url,div,view,record_id){
        
      // Create xmlHttp
            var xmlHttpObject = AJAX();

            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                      
                       document.getElementById(div).innerHTML=xmlHttpObject.responseText;

                    }
                    else {   
                       document.getElementById(div).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";
                      
                    }
            }
             
            var parameters="&view="+view+"&id="+record_id+"&token=ajax";
            
            xmlHttpObject.open("GET", url+parameters, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(null);

};
function ajaxFormButton(uri,div,form){
        
       // alert($("#MalSlide_wbc").val()+" = "+$("#"+form).serialize());
        
     // Create xmlHttp
            var xmlHttpObject = AJAX();
            //alert($("#"+form).serialize());
            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                       returnString = xmlHttpObject.responseText;
                      // returnArray = returnString.split("_'!^*'_");

                       //output = returnArray[1];
                       document.getElementById(div).innerHTML = xmlHttpObject.responseText;
                       
                       
                       
                       parentGridArray = returnArray[0].split("=>");
                      // updateGridView(parentGridArray[1]);

                    }
                    else {   
                       document.getElementById(div).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";  
                    }
            }
             
            var parameters="type=ajax&"+$("#"+form).serialize();
            
            xmlHttpObject.open("POST", uri, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(parameters);
            
            
}


function ajaxFormSubmit(uri,div,form,show_wait){
     
     $.ajax({
            type: "post",
            url:  uri,
            data: $("#"+form).serialize(),
            dataType: "json",
            beforeSend: function(x) {
              var wait;
              if(show_wait=='0'){
                  wait=""; 
              }
              else{
                  wait="Please wait...";
              }
              $('#'+div).html(wait);
              if(x && x.overrideMimeType) {
                    x.overrideMimeType("application/j-son;charset=UTF-8");
              }

            },

            success: function(data){
                    
                    $('#'+div).html(data.div);
                    //if(skip_patternDiv != ''){
                    //    $('#'+skip_patternDiv).html(data.skip);
                   // }
                    
                    //update grid
                    if(data.closeDialog == 1){
                        
                        closeDialog(data.parent_grid);
                    }
                    
                    //update grid
                    if(data.updateGrid == 1){ 
                        updateGrid(data.parent_grid);   //data.parent_grid
                                       
                    }
                    
                    
                    
                    if(data.redirect==1){
                        //redirect main page.
                        window.location=data.newpage;
                    }
                    
            },
             error: function (response, status) {
                //alert("Error! "+response.toString()+" "+status);
              $('#'+div).html("An error occured.");
            }

    });
         
}

function deleteDialogMessage(url,div,model, id){
    
    mess="<p> Are you sure you want to delete this item? </p>\n\
         <a href='#' onClick='ajaxDelete(\""+url+"\",\""+div+"\", \""+model+"\", \""+id+"\")'> DELETE </a> &nbsp; &nbsp; &nbsp; \n\
          <a href='#' onClick='closeDialogBox();' > CANCEL </a>";
    
    document.getElementById(div).innerHTML=mess;
    
}

function dialogContent(div ,title,content_id){
    
    content=$("div#"+content_id).html();
    //$("div#"+content_id).html("");
    $("div#"+content_id).show();
    document.getElementById("ui-dialog-title-dialog-id").innerHTML=title;
   // document.getElementById(div).innerHTML=content;
}

function ajaxDelete(uri, div, modelName, id){
   
     
     
     $.ajax({
            type: "GET",
            url:  uri,
            data: {model:modelName, id:id},
            dataType: "json",
            beforeSend: function(x) {  
              $('#'+div).html("Please wait...");
              if(x && x.overrideMimeType) {
                    x.overrideMimeType("application/j-son;charset=UTF-8");
              }

            },

            success: function(data){
                    
                    $('#'+div).html(data.div);
                   
                    if(data.redirect==1){
                        //redirect main page.
                        window.location=data.newpage;
                    }
                    
                    if(data.closeDialog == 1){
                        closeDialogBox(data.parent_grid);
                    }
                    //update grid
                    if(data.updateGrid == 1){ 
                        updateGrid(data.parent_grid);
                    }
                    
            },
             error: function (response, status) {
                //alert("Error! "+response.toString()+" "+status);
              $('#'+div).html("An error occured.");
            }

    });
}

function  showAjaxViewTabs(url,div,view_id, view_file){   
        
       // alert(view_id);
      // Create xmlHttp
            var xmlHttpObject = AJAX();

            // The code...
            xmlHttpObject.onreadystatechange=function(){
                    if(xmlHttpObject.readyState==4 ){
                      
                       document.getElementById(div).innerHTML=xmlHttpObject.responseText;

                    }
                    else {
                       document.getElementById(div).innerHTML="Please Wait...<br/> <img src='images/loader.gif' alt='loading' />";
                    }
            }
           
            var parameters="&view_id="+view_id+"&div="+div+"&view_file="+view_file;
             
            xmlHttpObject.open("GET", url+parameters, true);
            xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttpObject.send(null);
 }
 
 function updateGrid(parent_id)
{   
$.fn.yiiGridView.update(parent_id, {   
data: $(this).serialize()
});  
}

function closeDialogBox(dialog_id){
         // $("#StorageMedia-dialog-id").dialog('close');
         $("#dialog-id").dialog('close');
}

function ajaxUniversalGetRequest(uri,div,string){
     
     $.ajax({
            type: "GET",
            url:  uri,
            data: {string: string},
            dataType: "json",
            beforeSend: function(x) {  
              $('#'+div).html("Please wait...");
              if(x && x.overrideMimeType) {
                    x.overrideMimeType("application/j-son;charset=UTF-8");
              }

            },

            success: function(data){
                    
                    $('#'+div).html(data.div);
                    if(data.redirect==1){
                        //redirect main page.
                        
                        window.location=data.newpage;
                    }
                    if(data.reload==1){
                        location.reload();
                       //updateGridView("yw0")
                    }
                    //update grid
                    if(data.updateGrid == 1){
                        updateGridView(data.parent_grid);
                    }
            },
             error: function (response, status) {
               // alert("Error! "+response.toString()+" "+status);
              $('#'+div).html("An error occured.");
            }

    });
         
}

function strtoupper (str) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Onno Marsman
  // *     example 1: strtoupper('Kevin van Zonneveld');
  // *     returns 1: 'KEVIN VAN ZONNEVELD'
  return (str + '').toUpperCase();
}


