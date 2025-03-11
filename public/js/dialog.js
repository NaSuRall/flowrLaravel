const currentGroup = document.getElementById("groupID");

function getData(url, groupId) {
    // if (!target || !url) {
    //     console.error("Target or URL is not defined.");
    //     return;
    // }
    let urldata = url;
    if (groupId) {
        urldata += "/" + groupId
    }
    $.ajax({
        url: urldata,
        type: "GET",
        success: function (response) {
            $("#contentArea").html(response);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            $("#contentArea").html("<p>Erreur lors du chargement.</p>");
        }
    });
}
$(document).ready(function () {
    let target = $(this).attr("data-target");
    let url = "/group-content/accueil"  ;
    getData(url, currentGroup.value);

    $(".nav-link").click(function (e) {
        e.preventDefault();

        let target = $(this).attr("data-target");
        let url = "/group-content/" + target;

        getData(url, target)
    });
});



const dialog = document.querySelector("dialog");
const showButton = document.querySelector("dialog + button");
const closeButton = document.querySelector("dialog button");

// Le bouton "Afficher la fenêtre" ouvre le dialogue
showButton.addEventListener("click", () => {
    dialog.showModal();
});

// Le bouton "Fermer" ferme le dialogue
closeButton.addEventListener("click", () => {
    dialog.close();
});
