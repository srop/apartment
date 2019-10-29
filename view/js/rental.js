  $("form#formaddrental").submit(function(event){
              
            var id = $("#items_id").val();
         
           //disable the default form submission
            event.preventDefault();
             var url_redirect = '../pages/main_detail.php?id='+id;
        
            //grab all form data  
            var formData = new FormData($(this)[0]);
         
              $.ajax({
                 url: "../../class/add_renatl.class.php",
                 type: 'POST',
                 data: formData,
                 async: false,
                 cache: false,
                 contentType: false,
                 processData: false,
                  dataType: "html",
                  success: function(msg){

                                                    if(parseInt(msg)!=0)    //if no errors
                                                    {
                                                            $('#example2').html(msg);    //load the returned html into pageContet
                                                         //   $('#loading').css('visibility','hidden'); //and hide the rotating gif
                                                    }
                                            }
                   });
                 }
               });
    
            });

   