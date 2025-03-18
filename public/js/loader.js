document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        document.getElementById("loader").style.opacity = "0"; // Début du fondu
        setTimeout(() => {
            document.getElementById("loader").style.display = "none"; // Cache définitivement
            document.getElementById("content").style.display = "block"; // Affiche le contenu
        }, 1000); // Attends la fin du fondu
    }, 1500); // Laisse le logo tourner avant le fondu
});
