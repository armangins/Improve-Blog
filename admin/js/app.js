$(document).ready(function() {



  $('#selectAll').click(function(event){

    if(this.checked){
        $('.selected').each(function(){
            this.checked=true;
        })
    } else{
        $('.selected').each(function(){
            this.checked=false;
        })
    }

  })
    
  var div_box ="<div id='load-screen'><div id='loading'></div></div>";
  $('body').prepend(div_box);
 
  $('#load-screen').delay(600).fadeOut(100,function(){
      $(this).remove();
  });
     
 });



 tinymce.init({selector:'textarea'});
