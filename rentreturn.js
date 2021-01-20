function RentReturn()
{
    var session = document.querySelector('#hiddensession').innerHTML;
    var id_book = this.event.target.id;
    $.ajax({
        type: 'POST',
        url: "rent-return.php",
        data: { id_book: id_book, session: session},
        success: function() {
            alert("Książka została pomyślnie oddana!");
            window.location.reload();
        }
    });
}