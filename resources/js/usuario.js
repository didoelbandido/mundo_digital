function doaction()
{
 
    
    $("#error").hide()
    $("#succ").hide()



   

    $('#agregarUsuario').click(function()
    {
        $("#error").hide()
        $("#succ").hide()
        let formData = new FormData($('#frmUsuario')[0]) 

        $.ajax({

            url: ruta+'/Usuario/doRegistrar',
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
                    $('#frmUsuario')[0].reset()
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


   

    


}