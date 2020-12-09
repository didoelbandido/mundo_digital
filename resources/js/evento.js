function doaction()
{
 
    
    $("#error").hide()
    $("#succ").hide()
    $("#panelCursos").hide()


   

    $('#agregarEvento').click(function()
    {
        $("#error").hide()
        $("#succ").hide()
        let formData = new FormData($('#frmEvento')[0]) 

        $.ajax({

            url: ruta+'/Evento/doSave',
            type: 'POST',
            dataType:'JSON',
            data: formData,
            cache: false,
            contentType:false,
            processData:false,
            success: function(e)
            {
                if(e.error=='')
                {
                    $("#succ").show()
                    $('#msg_ok').html(e.ok)
                    $('#frmEvento')[0].reset()
                    setTimeout(function(){ $("#succ").hide() }, 6000)
                   
                    
                   
                }
                else
                {
                    $("#error").show()
                    $('#msg_error').html(e.error)
                }
            }
            })

        return false
    })


    $('#btn_mostrar').click(function(){
        
        

        $.ajax({

            url: ruta+'/Evento/doList',
            type: 'POST',
            dataType:'JSON',
            data: {},
            success: function(e)
            {
               console.log(e)    
               $('#panelCursos').show()
               $('#objCursos').html(e.data)
               
            }
            })


    })

    


}