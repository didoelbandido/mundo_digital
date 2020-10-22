function doaction()
{
 
    
    $("#error").hide()
    $("#succ").hide()
    $('#panelTbl').hide()
    $('#tbl_error').hide()

   

    $('#frmCon').submit(function()
    {
        $("#error").hide()
        $("#succ").hide()

        $.ajax({

            url: ruta+'/Contactanos/doSave',
            type: 'POST',
            dataType:'JSON',
            data: $('#frmCon').serialize(),
            success: function(e)
            {
                if(e.error=='')
                {
                    $("#succ").show()
                    $('#msg_ok').html(e.ok)
                    $('#frmCon')[0].reset()
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

    $('#btnMostrar').click(function(){
        $('#tbl_error').hide()
        

        $.ajax({

            url: ruta+'/Contactanos/doList',
            type: 'POST',
            dataType:'JSON',
            data: {},
            success: function(e)
            {
                $('#panelTbl').bootstrapTable("destroy")
                $('#panelTbl').bootstrapTable({data: e.data})

               if(e.data.length>0){
                    $('#panelTbl').show()
                    $(function(){
                    $('#tblComent').bootstrapTable({
                        data: e.data
                    })
                    $('#tblComent').bootstrapTable('hideColumn','f1')
                    
                   })
               }
               else
               {

                $('#tbl_error').show()
                $('#tbl_msg_error').html("No se encutra registro")

               }
            }
            })


    })

    $('#btnOcultar').click(function(){
        $('#panelTbl').hide()

    })


}