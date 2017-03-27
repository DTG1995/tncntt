function active_mean(url){
    $.ajax({
            type: "POST",
            url: url
        });
}
function active_define(url){
    $.ajax({
            type: "POST",
            url: url
        });
}
function define_contribute(url,e,value){
    if(e.keyCode==13){
        $.ajax({
            type: "POST",
            url: url+"/"+value
        });
    }
}
function mean_contribute(url,e,value){
    if(e.keyCode==13){
        $.ajax({
            type: "POST",
            url: url+"/"+value
        });
    }
}