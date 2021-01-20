function informations()
{
    let conent = document.querySelector('.content');
    let informations = document.querySelector('#informations');
    let sesja = document.querySelector('#hiddensession').innerHTML;
    $.ajax({
        type: 'POST',
        url: "informations.php",
        data: { sesja: sesja },
        success: function(data) {
           
            conent.innerHTML = data;
            ownedbooks.style.backgroundColor = "rgb(238, 229, 229)";
            messages.style.backgroundColor = "rgb(238, 229, 229)";
            passchange.style.backgroundColor = "rgb(238, 229, 229)";
            informations.style.backgroundColor = "rgb(133, 131, 131)";
        }
    });


}