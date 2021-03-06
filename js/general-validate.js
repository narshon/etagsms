/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//functions
var hideDiv=function hideDiv(model,sourcediv,targetdiv,cValue,operator,targetValue,messageDiv,message){
   
   if(operator=="!="){
    if($("#"+model+"_"+sourcediv).val()!=cValue){
        $("div#"+targetdiv+"_div").hide("slow");
        $("#"+model+"_"+targetdiv).val(targetValue);
        if(messageDiv)
        $("div#"+messageDiv).html("<p>"+message+"</p>");
    }
    else {
         $("div#"+targetdiv+"_div").show("slow");
         if(messageDiv)
         $("div#"+messageDiv).html("");
    }
   }
   else if(operator=="=="){
        if($("#"+model+"_"+sourcediv).val()==cValue){
            $("div#"+targetdiv+"_div").hide("slow");
            $("#"+model+"_"+targetdiv).val(targetValue);
            if(messageDiv)
             $("div#"+messageDiv).html("<p>"+message+"</p>");
        }
        else {
             $("div#"+targetdiv+"_div").show("slow");
             if(messageDiv)
               $("div#"+messageDiv).html("");
        }
   }
   else if(operator=="notnull"){
       if($("#"+model+"_"+targetdiv).val()){
            $("div#"+targetdiv+"_div").show("slow");
            if(messageDiv)
             $("div#"+messageDiv).html("<p>"+message+"</p>");
        }
        else {
             $("div#"+targetdiv+"_div").show("slow");
             if(messageDiv)
               $("div#"+messageDiv).html("");
        }
   }
   else if(operator==">"){
         
        if($("#"+model+"_"+sourcediv).val()>cValue){
            
            if(targetdiv != "target"){
              $("div#"+targetdiv+"_div").hide("slow");
              $("#"+model+"_"+targetdiv).val(targetValue);  
            }
            if(messageDiv)
             $("div#"+messageDiv).html("<p>"+message+"</p>");
            
        }
        else {
            if(targetdiv!="target"){
                 $("div#"+targetdiv+"_div").show("slow");
            }
            if(messageDiv)
             $("div#"+messageDiv).html("");
        }
   }
     else if(operator=="<"){
        if($("#"+model+"_"+sourcediv).val()<cValue){
            
            if(targetdiv!="target"){
               $("div#"+targetdiv+"_div").hide("slow");
               $("#"+model+"_"+targetdiv).val(targetValue);
            }
            if(messageDiv)
              $("div#"+messageDiv).html("<p>"+message+"</p>");
        }
        else {
            
            if(targetdiv!="target"){
                 $("div#"+targetdiv+"_div").show("slow");
            }
            if(messageDiv)
             $("div#"+messageDiv).html("");
        }
   }
   
    
    
}
function onChangeHideDivEvent(model,source,target,cValue,operator,targetValue,messageDiv,message){
    
  $("#"+model+"_"+source).change(function(){
      hideDiv(model,source,target,cValue,operator,targetValue,messageDiv,message);
  });
}

function bothChangeAndLoadEvents(model,source,target,cValue,operator,targetValue,messageDiv,message){
  onChangeHideDivEvent(model,source,target,cValue,operator,targetValue,messageDiv,message);
  hideDiv(model,source,target,cValue,operator,targetValue);
}

function onSubmitEvent(model,source,target,cValue,operator,errordiv){
      $("form").submit(function(){ 
        if(operator=="=="){
            
          if($("#"+model+"_"+source).val()==cValue){
              if($("#"+model+"_"+target).val()==''){
                  $("div#"+errordiv).empty();
                  $("div#"+errordiv).append("<font color='red'>All the fields above must be filled ;-)</font>");
                  return false; 
              }
          }  
        }
          
         
      });
}

function onCheckEvent(model,source,target,cValue,targetValue){
    
    $("#"+model+"_"+source).click(function () {
       onLoadCheckEvent(model,source,target,cValue,targetValue)
       
   });
}

function onLoadCheckEvent(model,source,target,cValue,targetValue){
    if(cValue==1){
             if ($("#"+model+"_"+source).is(':checked'))
              {
                $("div#"+target+"_div").hide("slow");
                $("#"+model+"_"+target).val(targetValue);
             
              }
               else{
                    $("div#"+target+"_div").show("slow");
                }
        }
       if(cValue==0){   
                 if ($("#"+model+"_"+source).is(':checked'))
                  {
                    $("div#"+target+"_div").show("slow");
             
                  }
               else{
                    $("div#"+target+"_div").hide("slow");
                    $("#"+model+"_"+target).val(targetValue);
                }
       }
}

function bothOnloadAndCheckEvent(model,source,target,cValue,targetValue){
    onCheckEvent(model,source,target,cValue,targetValue);
    onLoadCheckEvent(model,source,target,cValue,targetValue);
    
    
}
function toggleLabel(label,model,source,cValue,operator){
    if(operator=='=='){
        if($("#"+model+"_"+source).val()==cValue){
            $("div#"+label+"div").show("slow");
        }
        else {
            $("div#"+label+"div").hide("slow");
        }
        
    }
    if(operator=='!='){
        if($("#"+model+"_"+source).val()!=cValue){
            $("div#"+label+"div").show("slow");
        }
        else {
            $("div#"+label+"div").hide("slow");
        } 
     }
    
}

function toggleReadOnlyAttribute(field,field_color,flag){
    if(flag==1){
        $('#'+field).attr('readonly', true);
        $('#'+field).css({'background-color': field_color});
    }
    else{
        $('#'+field).removeAttr('readonly');
        $('#'+field).css({'background-color': field_color});
    }
    
}

// Simulates PHP's date function
Date.prototype.format = function(format) {
    var returnStr = '';
    var replace = Date.replaceChars;
    for (var i = 0; i < format.length; i++) {       var curChar = format.charAt(i);         if (i - 1 >= 0 && format.charAt(i - 1) == "\\") {
            returnStr += curChar;
        }
        else if (replace[curChar]) {
            returnStr += replace[curChar].call(this);
        } else if (curChar != "\\"){
            returnStr += curChar;
        }
    }
    return returnStr;
};

Date.replaceChars = {
    shortMonths: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    longMonths: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    shortDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    longDays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],

    // Day
    d: function() { return (this.getDate() < 10 ? '0' : '') + this.getDate(); },
    D: function() { return Date.replaceChars.shortDays[this.getDay()]; },
    j: function() { return this.getDate(); },
    l: function() { return Date.replaceChars.longDays[this.getDay()]; },
    N: function() { return this.getDay() + 1; },
    S: function() { return (this.getDate() % 10 == 1 && this.getDate() != 11 ? 'st' : (this.getDate() % 10 == 2 && this.getDate() != 12 ? 'nd' : (this.getDate() % 10 == 3 && this.getDate() != 13 ? 'rd' : 'th'))); },
    w: function() { return this.getDay(); },
    z: function() { var d = new Date(this.getFullYear(),0,1); return Math.ceil((this - d) / 86400000); }, // Fixed now
    // Week
    W: function() { var d = new Date(this.getFullYear(), 0, 1); return Math.ceil((((this - d) / 86400000) + d.getDay() + 1) / 7); }, // Fixed now
    // Month
    F: function() { return Date.replaceChars.longMonths[this.getMonth()]; },
    m: function() { return (this.getMonth() < 9 ? '0' : '') + (this.getMonth() + 1); },
    M: function() { return Date.replaceChars.shortMonths[this.getMonth()]; },
    n: function() { return this.getMonth() + 1; },
    t: function() { var d = new Date(); return new Date(d.getFullYear(), d.getMonth(), 0).getDate() }, // Fixed now, gets #days of date
    // Year
    L: function() { var year = this.getFullYear(); return (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)); },   // Fixed now
    o: function() { var d  = new Date(this.valueOf());  d.setDate(d.getDate() - ((this.getDay() + 6) % 7) + 3); return d.getFullYear();}, //Fixed now
    Y: function() { return this.getFullYear(); },
    y: function() { return ('' + this.getFullYear()).substr(2); },
    // Time
    a: function() { return this.getHours() < 12 ? 'am' : 'pm'; },
    A: function() { return this.getHours() < 12 ? 'AM' : 'PM'; },
    B: function() { return Math.floor((((this.getUTCHours() + 1) % 24) + this.getUTCMinutes() / 60 + this.getUTCSeconds() / 3600) * 1000 / 24); }, // Fixed now
    g: function() { return this.getHours() % 12 || 12; },
    G: function() { return this.getHours(); },
    h: function() { return ((this.getHours() % 12 || 12) < 10 ? '0' : '') + (this.getHours() % 12 || 12); },
    H: function() { return (this.getHours() < 10 ? '0' : '') + this.getHours(); },
    i: function() { return (this.getMinutes() < 10 ? '0' : '') + this.getMinutes(); },
    s: function() { return (this.getSeconds() < 10 ? '0' : '') + this.getSeconds(); },
    u: function() { var m = this.getMilliseconds(); return (m < 10 ? '00' : (m < 100 ?
'0' : '')) + m; },
    // Timezone
    e: function() { return "Not Yet Supported"; },
    I: function() { return "Not Yet Supported"; },
    O: function() { return (-this.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(this.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(this.getTimezoneOffset() / 60)) + '00'; },
    P: function() { return (-this.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(this.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(this.getTimezoneOffset() / 60)) + ':00'; }, // Fixed now
    T: function() { var m = this.getMonth(); this.setMonth(0); var result = this.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/, '$1'); this.setMonth(m); return result;},
    Z: function() { return -this.getTimezoneOffset() * 60; },
    // Full Date/Time
    c: function() { return this.format("Y-m-d\\TH:i:sP"); }, // Fixed now
    r: function() { return this.toString(); },
    U: function() { return this.getTime() / 1000; }
};

