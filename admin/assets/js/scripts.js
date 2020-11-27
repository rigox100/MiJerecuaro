$(document).ready(function(){

    fn_start();
    
    });

    function fn_start(){
	
        $.ajax({
            url: 'modules/notes/index.html',
            type: 'get',
            success: function(data){
                $('#content').html(data);
            }
        });

        
    }