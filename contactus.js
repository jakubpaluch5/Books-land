function contactus()
{
    let informations = document.querySelector('#informations');
    let conent = document.querySelector('.content');
    let messages = document.querySelector('#messages');
    let passchange = document.querySelector('#passchange');
    let ownedbooks = document.querySelector('#ownedbooks');
    $.ajax({
        type: 'POST',
        url: "contactus.php",
        success: function(data) {
           
            
            conent.innerHTML = data;
            messages.style.backgroundColor = " rgb(133, 131, 131)";
            passchange.style.backgroundColor = "rgb(238, 229, 229)";
            ownedbooks.style.backgroundColor = "rgb(238, 229, 229)";
            informations.style.backgroundColor = "rgb(238, 229, 229)";
            
        }
    });
}