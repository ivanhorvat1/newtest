//fadeout message div
setTimeout(function(){ $("#div1").fadeOut(300); },3000);

//fade in div
$(document).ready(function () { $('div.hidden').fadeIn(1000).removeClass('hidden'); });

//delete selected file
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}

//jquery table client
$(document).ready(function(){
    $('#myTable').DataTable({
        "columnDefs": [{
            "defaultContent": "-",
            "targets": "_all"
        }]
    });
});

//jquery table invoice
$(document).ready(function(){
    $('#myTable1').DataTable({
        "columnDefs": [{
            "defaultContent": "-",
            "targets": "_all"
        }]
    });
});