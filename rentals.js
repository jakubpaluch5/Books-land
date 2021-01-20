function getId()
{
    var button = document.getElementById("btn-accept");
    var id_card = this.event.target.id;
    $.ajax({
        type: 'POST',
        url: "rentphp.php",
        data: { id_card: id_card },
        success: function(data) {
            document.getElementById('rental-photo').src = `books/${data.trim()}`;
            document.getElementById('rent-card-title').innerHTML = `data`;
            document.getElementById('card-id').innerHTML = id_card
            ;

        }
    });
    
  
    $.ajax({
        type: 'POST',
        url: "rent-description.php",
        data: { id_card: id_card },
        success: function(data) {
           
            document.getElementById('rent-card-description').innerHTML = data;
        }
    });
    $.ajax({
        type: 'POST',
        url: "rent-title.php",
        data: { id_card: id_card },
        success: function(data) {
           
            document.getElementById('rent-card-title').innerHTML = data;
        }
    });
    button
    var block = document.getElementById("rent-window-blocker");
    var window = document.getElementById("rental-window");
    
    window.style.display = "block";
    block.style.display = "block";


   

}
