function accept()
{
    
    var id_card = document.getElementById("card-id").innerHTML;
    var id_user = document.getElementById("user-id").innerHTML;
    $.ajax({
        type: 'POST',
        url: "rent-accept.php",
        data: { id_card: id_card, id_user: id_user },
        success: function(data) {
            window.location.reload();
            alert(data);
            
        }
    });
   

}
