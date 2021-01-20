

$(document).ready(function () {
    
    let zmiana = document.querySelector('#select');
    let okno = document.querySelector('#avatar_selector');
    let strona = document.querySelector('#firstpage');
    let zamknij = document.querySelector('#avatar_selector > i');




    zmiana.addEventListener("click", function () {



        okno.style.top = "20%";

    });
    zamknij.addEventListener("click", function () {



        okno.style.top = "-100%";

    });



    $("img#avatar1").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-one-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
    $("img#avatar2").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-two-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
    $("img#avatar3").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-three-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
    $("img#avatar4").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-four-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
    $("img#avatar5").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-five-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
    $("img#avatar6").click(function () {
        $.ajax({
            type: "POST",
            url: "avatar-six-change.php",
            data: {
                lighton: "true"
            },
            success: function () {
                window.location.reload();
            }
        });
    });
});