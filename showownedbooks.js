function showownedbooks()
{
    let informations = document.querySelector('#informations');
    let conent = document.querySelector('.content');
    let sesja = document.querySelector('#hiddensession').innerHTML;
    let ownedbooks = document.querySelector('#ownedbooks');
    let passchange = document.querySelector('#passchange');
    let messages = document.querySelector('#messages');
    $.ajax({
        type: 'POST',
        url: "showownedbooks.php",
        data: { sesja: sesja },
        success: function(data) {
           
            conent.innerHTML = data;
            ownedbooks.style.backgroundColor = " rgb(133, 131, 131)";
            messages.style.backgroundColor = "rgb(238, 229, 229)";
            passchange.style.backgroundColor = "rgb(238, 229, 229)";
            informations.style.backgroundColor = "rgb(238, 229, 229)";
        }
    });
}