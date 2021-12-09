//Get data from Resource page
$("#Resource").click(function(){
    $.post($("#Resource").attr("action"), $("#Resource :input").serializeArray(), function(info){ $("#result").html(info);})
});

//Stay on page
$("Resource").submit(function(){
    return false;
});