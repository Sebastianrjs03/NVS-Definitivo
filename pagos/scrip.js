function toggleForm() {
    var form = document.getElementById("tarjeta-form");
    var arrow = document.querySelector("#tarjeta-header .arrow");
    var otrosMetodos = document.querySelectorAll(".pequeño");

    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";  
        arrow.innerHTML = "&#x25B2;"; 

        otrosMetodos.forEach(function(metodo) {
            metodo.classList.add("metodo-pequeño");
        });
    } else {
        form.style.display = "none";  
        arrow.innerHTML = "&#x25BC;"; 

    
        otrosMetodos.forEach(function(metodo) {
            metodo.classList.remove("metodo-pequeño");
        });
    }
}
