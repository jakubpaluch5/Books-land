$("i#exit-cross").click(function () {
    var window = document.getElementById("rental-window");
    var block = document.getElementById("rent-window-blocker");
    block.style.display = "none";
    window.style.display = "none";
    
});