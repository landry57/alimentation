//inscription
$(function(){
    $('#registerForm').submit(function(e){
        e.preventDefault();
        $("#nameError").empty();
        $("#lasnameError").empty();
        $("#emailError").empty();
        $("#telError").empty();
        $("passwordError").empty();
        $('repeatpasswordError').empty();
        var postData =$("#registerForm").serialize();
        //console.log(postData);
    $.ajax({
         type:"POST",
         url:"traitement.php",
         data:postData,
         dataType:"json",
         success: function(result){
         if (result.isSuccess) {
             if (result.globalError) {
                $("#registerForm").append('<div id="errorglobal"></div>');
                $("#errorglobal").html(result.globalError).css({
                    color:'red',
                    fontStyle:'italic', 
                    }); 
                    $("#registerForm")[0].reset();

             }else
             {
               $(".isSuccess").html(result.isSuccess).css({
                color:'green',
                fontStyle:'italic', 
                }); 
                $("#registerForm")[0].reset();
              }
         }
         else
         {
          $(".nameError").html(result.nameError).css({
              color:'red',
              fontStyle:'italic',
              fontFamily:'sans-serif' 
          });
          $(".lastnameError").html(result.lastnameError).css({
            color:'red',
            fontStyle:'italic',
            fontFamily:'sans-serif' 
          });
          $(".emailError").html(result.emailError).css({
            color:'red',
            fontStyle:'italic',
            fontFamily:'sans-serif' 
          });
          $(".telError").html(result.telError).css({
            color:'red',
            fontStyle:'italic',
            fontFamily:'sans-serif' 
          });
          $(".passwordError").html(result.passwordError).css({
            color:'red',
            fontStyle:'italic',
            fontFamily:'sans-serif' 
           });
           $(".repeatpasswordError").html(result.repeatpasswordError).css({
            color:'red',
            fontStyle:'italic',
            fontFamily:'sans-serif' 
           });

         }
         }
    });
    });
})
//connexion ou login (verification avec keyup)

$(document).ready(function(){
  $(function(){
    $("#loginForm").keyup(function(e){
     e.preventDefault();
     $("#emailError").empty();
     $("#passError").empty();
     var data =$("#loginForm").serialize();
     
     $.ajax({
       type:'POST',
       url:'login.php',
       data:data,
       dataType:'json',
       success:function(dataUse){
         //verification directe des coordonnees de login user
         //verify email
         if (dataUse.emailDb) {
           $("input:text").css({
            color:'green',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'green' 
           });
           
         }else
         {
          $("input:text").css({
            color:'red',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'red' 
           });
         }
         //password verify
         if (dataUse.passwordDb) {
          $("input:password").css({
           color:'green',
           fontSize:'18px',
           fontStyle:'italic',
           fontFamily:'sans-serif',
           borderColor:'green' 
          });
        }else
        {
         $("input:password").css({
           color:'red',
           fontSize:'18px',
           fontStyle:'italic',
           fontFamily:'sans-serif',
           borderColor:'red' 
          });
        }
        if (dataUse.isSuccess) {
          
        }else
        {
          //  console.log(dataUse.emailError);
        }
       }
     });
    });
})
})
//connexion ou login par la button submit
$(function(){
    $("#loginForm").submit(function(e){
     e.preventDefault();
     $("#emailError").empty();
     $("#passError").empty();
     var data =$("#loginForm").serialize();
     $.ajax({
       type:'POST',
       url:'login.php',
       data:data,
       dataType:'json',
       success:function(dataUse){
        if (dataUse.isSuccess) {
          document.location.href="count.php";
          $("#loginForm")[0].reset();
        }else
        {
            //console.log(dataUse.emailError);
        }
       }
     });
    });
})
//slideToggle
$(document).ready(function(){
  $('.form').hide();
  $('.tab-content a').click(function(e){
      e.preventDefault();
      $(this).parent().next().slideToggle();
      if ($(this).html()=='<span class="glyphicon glyphicon-shopping-cart">Acheter</span>') {
        $(this).html('<span class="glyphicon glyphicon-shopping-cart">Fermer</span>');
      }else
      {
        $(this).html('<span class="glyphicon glyphicon-shopping-cart">Acheter</span>');
      }
  });
});


//validation recharge
$(function(){
    $("#rechargeForm").submit(function(e){
     e.preventDefault();
     $("#emailError").empty();
     $("#sumError").empty();
     
     var data =$("#rechargeForm").serialize();
     console.log(data);
     $.ajax({
       type:'POST',
       url:'confirmerech.php',
       data:data,
       dataType:'json',
       success:function(dataUse){
        if (dataUse.isSuccess) {
          if (dataUse.gError) {
            $('#code').html(dataUse.gError).css('color','red');
            $("#rechargeForm")[0].reset();
          }
          else
          {
         $('#code').html(dataUse.code);
         $("#rechargeForm")[0].reset();
          }
        }else
        {
            $('#emailError').html(dataUse.emailError).css('color','red');
            $('#sumError').html(dataUse.sumError).css('color','red');

        }
       }
     });
    });
})
//confirmation du credit
$(function(){
  $("#conf").submit(function(e){
   e.preventDefault();
   $("#res").empty();
   
   var datac =$("#conf").serialize();
   $.ajax({
     type:'POST',
     url:'conf.php',
     data:datac,
     dataType:'json',
     success:function(dataUse){
      if (dataUse.isSuccess) {
        if (dataUse.gError) {
          $('#res').html(dataUse.gError).css('color','red');
          $("#conf")[0].reset();
        }else
        {
          $('#res').html(dataUse.globalSuccess).css('color','green');
          $("#conf")[0].reset();
        }
      
      }else
      {

      $('#res').html(dataUse.codeError).css('color','red');
      }
     }
   });
  });
})
//commande
$(function(){
  $("#commande").submit(function(e){
   e.preventDefault();
   
   var valcom =$("#commande").serialize();
   console.log(valcom);
   $.ajax({
     type:'POST',
     url:'pages/commande.php',
     data:valcom,
     dataType:'json',
     success:function(result){
      if (result.isSuccess) {
       
          $('#aff').html(result.isSuccess).css('color','green');
          $("#commande")[0].reset();
       
      }else
      {

      $('#res').html(result.codeError).css('color','red');
      }
     }
   });
  });
})