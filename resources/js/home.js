function doaction()
{
  
 

   

   

        $.ajax({

            url: ruta+'/Evento/doList',
            type: 'POST',
            dataType:'JSON',
            data: {},
            success: function(e)
            {
               console.log(e)    
               
               $('#objCursos').html(e.data)
               
            }
            })


    

    


}