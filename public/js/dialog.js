document.addEventListener("DOMContentLoaded", function() {
    const dialogName = document.getElementById("dialogModifNom");
    const showButtonEditName = document.getElementById("modifNom");
    const closeButtonEditName = document.getElementById("btnCloseModifNom");

    if (showButtonEditName && dialogName && closeButtonEditName) {
        showButtonEditName.addEventListener("click", () => {
            dialogName.showModal();
        });

        closeButtonEditName.addEventListener("click", () => {
            dialogName.close();
        });
    } else {
        console.error("Un élément est introuvable dans le DOM.");
    }
});


const dialogMembre = document.getElementById("dialog-membre");
const dialogListe = document.getElementById("dialog-liste");

const showButtonMembre = document.getElementById("membre");
const showButtonListe = document.getElementById("createListe");

const closeButtonMembre = document.getElementById("btn-close-membre");
const closeButtonListe = document.getElementById("btn-close-liste");
showButtonMembre.addEventListener("click", () => {
    dialogMembre.showModal();
});
closeButtonMembre.addEventListener("click", () => {
    dialogMembre.close();
});
showButtonListe.addEventListener("click", () => {
    dialogListe.showModal();
});

closeButtonListe.addEventListener("click", () => {
    dialogListe.close();
});
