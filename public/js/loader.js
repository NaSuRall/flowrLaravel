document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        document.getElementById("loader").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";
        }, 1000);
    }, 2000);
});
