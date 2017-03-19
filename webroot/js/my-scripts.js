$(document).ready(function(){
        debugger;
        $("#search-box").keyup(function(e){
            console.log("thu1");
            $("#result").html("");
            $("#txtresult").val("");
            $("#ratingmean").html("");
            if(e.keyCode == 13){
                $.ajax({
                    type: "POST",
                    url: "pages/getresult/"+$(this).val(),
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
                    url: "pages/gethint/"+$(this).val(),
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat right");
                    },
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
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