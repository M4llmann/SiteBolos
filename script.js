document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".dropdown");
    var submenu = document.querySelector(".submenu");

    dropdown.addEventListener("click", function(event) {
        event.preventDefault(); // Impede o link de redirecionar

        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    });
});
