document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        document.getElementById("loader").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";
        }, 1000);
    }, 2000);
});


document.getElementById('burger-btn').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('open');
});

document.getElementById('close-btn').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.remove('open');
});
