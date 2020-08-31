$(".tasks").DataTable({});

$(".notes").DataTable({});

$("#add").click(function(){
    $("#new").show(500);
    $("#add").hide(500);
});

$("#close").click(function(){
    $("#new").hide(500);
    $("#add").show(500);
});

$("#add1").click(function(){
    $("#new1").show(500);
    $("#add1").hide(500);
});

$("#close1").click(function(){
    $("#new1").hide(500);
    $("#add1").show(500);
});