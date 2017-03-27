$(document).ready(function(){
        $("#search-box").keyup(function(e){
            console.log("thu1");
            $("#result").html("");
            $("#txtresult").val("");
            $var = $("input[type=textFind]").height() + 40;
            $("textarea").animate({
                height: $var
            });
            $("#ratingmean").html("");
            if(e.keyCode == 13){
                var str = jQuery.param($(this).val()  );
                $.ajax({
                    type: "POST",
                    url: "pages/getresult?word="+$(this).val(),
                    data:'keyword='+$(this).val(),
                    success: function(data){
                        $("#suggesstion-box").hide();
                        $("#result").html(data);
                        $("#search-box").css("background","#FFF");
                 }
             });
            }else{   
                    console.log("thu2 data");
                    $.ajax({
                    type: "POST",
                    url: "pages/gethint?word="+$(this).val(),
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat right");
                    },
                    success: function(data){
                        var availableTags =data.substring(0,data.length-1).split('@');
                        options={
                            source:availableTags,
                            max: 6,
                            highlightItem: true,
                            multiple: true,
                            multipleSeparator: " ", 
                        };
                        $("#search-box").autocomplete(options);
                        $("#search-box").css("background","#FFF");
                    }
                    });
                }});
            });
    //To select word
    function selectWord(val) {
        
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        $.ajax({
            type: "POST",
            url: "pages/getresult/"+val,
            data:'keyword='+val,
            success: function(data){
                $("#suggesstion-box").hide();
                $("#result").html(data);
                $("#search-box").css("background","#FFF");
            }
        });
    }
    function viewcomment(type,idhtml,id,parent){
        if($(idhtml).text()!="")
        {
            $(idhtml).text("");
            $(idhtml).hide();
        }
        else{
            // $('.commentcontent').hide();
            if(type=='define')
            {
                $.ajax({
                type: "POST",
                url: "pages/getcommentdefine/"+id+"/"+parent,
                success: function(data){
                    $(idhtml).html(data);
                    $(idhtml).show();
                    }
                });
            }
            else{
                $.ajax({
                type: "POST",
                url: "pages/getcommentmean/"+id+"/"+parent,
                success: function(data){
                    $(idhtml).html(data);
                    $(idhtml).show();
                    }
                });
            }
        }
    }
    function addcomment(type,idhtml,id,parent,a,e){
        
        if(e.keyCode==13)
        {
            $(idhtml).html("");
            if(type=='define'){
                url = "commentdefinitions/comment/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="commentdefinitions/comment/"+id+"/"+a.value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        $(idhtml).html(data);
                        $(idhtml).show();
                        }
                    });
            }
            else{
                url = "commentmeans/comment/"+id+"/"+a.value+"/"+parent;
                if(parent == 0)
                    url ="commentmeans/comment/"+id+"/"+a.value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        $(idhtml).html(data);
                        $(idhtml).show();
                        }
                    });
            }
        }
    }
    function like_dislike(type,id,value,idhtml,top=0){
        if(type=='define'){
                url = "likedefinitions/like/"+id+"/"+value;
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        $(idhtml).html(data);
                        }
                    });
            }
            else{
                if(top==0)
                    url = "likemeans/like/"+id+"/"+value;
                else url = "likemeans/like/"+id+"/"+value+"/"+top;
                $.ajax({
                    type: "script",
                    url: url,
                    success: function(data){
                        $(idhtml).html(data);
                        }
                    });
            }
    }

function changecontribute(type,url,id,value){
    if(type=='define'){
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        idhtml = "#define"+id;
                        $(idhtml).html(data);
                        }
                    });
            }
            else{
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data){
                        idhtml = "#mean"+id;
                        $(idhtml).html(data);
                        }
                    });
            }
}
    //back to top
        function toBottom()
        {
            window.scrollTo(0,document.body.scrollHeight);
        } 

var idwarning=-1;
var typewarning='';
function warning(type,id){
    idwarning = id;
    typewarning=type;
    url ="pages/warning/"+type+"/"+id
    $.ajax({
            type: "POST",
            url: url,
            beforeSend: function(){
                $("#modal-content").html('');
                $("#modal-content").css("background","#FFF url('LoaderIcon.gif') no-repeat center");
            },
            success: function(data){
                $("#modal-content").html(data);
                $("#modal-content").css("background","#FFF");
        }
    });
}
function addwarning(){
   url = 'app/addNotification/warning/'+typewarning+'/'+idwarning+'/'+encodeURIComponent($("#contentwarning").val())+'/'+encodeURIComponent($("#userwarning").val());
    $.ajax({
        url: url,
        success: function(data){
            alert('Cảm ơn bạn đã giúp chúng tôi phát hiên lỗi')
        }
    });
}