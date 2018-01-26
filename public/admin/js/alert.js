function top_alert(title, msg) {
    var title = title ? 'style="background:#4cd964;color:white;"' : 'style="background:#c9302c;color:white;"';
    $('body').append('<div id="top_alert"> <a id="click_alert" data-toggle="modal" href="#topalert" ></a><div class="modal fade" id="topalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div ><div class="modal-header " ' + title + '><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h5 class="modal-title">' + msg + '</h5></div></div></div></div></div>');
    $("#click_alert").click();
    setTimeout(function() {
        $("button[data-dismiss=modal]").click();
        setTimeout('$("#top_alert").remove();', 1000);
    }, 2000);
};

function alert_confirm(url,title,name,id,parent_id,del){
            $('.modal-title').html(title);
            $('.type_name').val(name);
            if(del=='1'){$('.type_name').attr('disabled',true);}
            else{$('.type_name').attr('disabled',false);}
            $('.alert_confirm').click();
            $('.editType').off().on('click',function(){
               name  = $('.type_name').val();
               $.ajax({
                type:'POST',
                url:url,
                data:{name:name,_token:$('input[name=_token_]').val(),id:id,parent_id:parent_id,del:del},
                success:function(data){
                 top_alert('1',data);
                 window.location.reload(); 
               
               },
               error:function(data){
                var json = JSON.parse(data.responseText);
                 $.each(json.errors,function(inx,msg){
                   top_alert('',msg);
                  });
               },
               dataType:'json',
               });
            })

        }