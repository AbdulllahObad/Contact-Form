
$(function (){



var userErrors ="true";//setting Error Status
var mailErrors = "true";
var msgError = "true";


function checkErrors() {
      if (userErrors === "true"|| userErrors === "true" || msgError === "true"){
            console.log('There are some errors')
      }else{
            console.log("There is no errror")
      }
      
}


$('.username').blur(function() {
      if($(this).val().length<4){
       $(this).css('border','1px solid #F00')
       $(this).parent().find('.custom-alert').fadeIn(300);
       $(this).parent().find('span').fadeIn(100);
       usermErrors = "true";

      } else{
       $(this).css('border','4px solid #080')

       $(this).parent().find('.custom-alert').fadeOut(300);
       $(this).parent().find('span').fadeOut(100);
       userErrors ="false"

      }

    
});



$('.email').blur(function() {
      if($(this).val() === ''){
       $(this).css('border','1px solid #F00')
       $(this).parent().find('.custom-alert').fadeIn(300);
       $(this).parent().find('span').fadeIn(100);
       mailErrors = "true";

      } else{
       $(this).css('border','4px solid #080')
       $(this).parent().find('.custom-alert').fadeOut(300).end().find('span').fadeOut(100);
    //   $(this).parent().find('span').fadeOut(100);
       mailErrors = "false";
      }
    
});

$('.message').blur(function() {
      if($(this).val().length <40 ){
       $(this).css('border','1px solid #F00')
       $(this).parent().find('.custom-alert').fadeIn(300);
       $(this).parent().find('span').fadeIn(100);
       msgError = "true";
      } else{
       $(this).css('border','4px solid #080')
       $(this).parent().find('.custom-alert').fadeOut(300);
       $(this).parent().find('span').fadeOut(100);
       msgError = "false";
      }
    
});


// submit Form Validation 

$('form').submit(function (e) {
if (userErrors === "true"|| mailErrors === "true" || msgError === "true"){
    
      e.preventDefault();
      $('.username').blur();
      $('.email').blur();
      $('.message').blur();


}else{

}

});
 

});