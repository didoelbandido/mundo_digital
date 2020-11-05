function doaction()
{
 
    
    $("#error").hide()
    $("#succ").hide()


   

    $('#agregarCurso').click(function()
    {
        $("#error").hide()
        $("#succ").hide()
        let formData = new FormData($('#frmCurso')[0]) 

        $.ajax({

            url: ruta+'/Curso/doSave',
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
                    $('#frmCurso')[0].reset()
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
    }
    )

    


}