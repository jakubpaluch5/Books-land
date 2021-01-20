function passwordchange()
{
    let informations = document.querySelector('#informations');
    let conent = document.querySelector('.content');
    let passchange = document.querySelector('#passchange');
    let messages = document.querySelector('#messages');
    let ownedbooks = document.querySelector('#ownedbooks');
    $.ajax({
        type: 'POST',
        url: "passwordchange.php",
        success: function(data) {
           
            
            conent.innerHTML = data;
            passchange.style.backgroundColor = " rgb(133, 131, 131)";
            messages.style.backgroundColor = "rgb(238, 229, 229)";
            ownedbooks.style.backgroundColor = "rgb(238, 229, 229)";
           informations.style.backgroundColor = "rgb(238, 229, 229)";

        }
    });
}