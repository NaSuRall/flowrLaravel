<style>
    .footer {
        background-color: #222;
        color: #fff;
        padding: 40px 0;
        text-align: center;
    }
    .footer .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 15px;
    }
    .footer-columns {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        text-align: left;
    }
    .footer-column {
        flex: 1;
        min-width: 200px;
        margin: 10px;
    }
    .footer-column h3 {
        border-bottom: 2px solid #1e90ff;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }
    .footer-column ul {
        list-style: none;
        padding: 0;
    }
    .footer-column ul li {
        margin: 5px 0;
    }
    .footer-column ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }
    .footer-column ul li a:hover {
        color: #1e90ff;
    }
    .footer-bottom {
        margin-top: 20px;
        border-top: 1px solid #444;
        padding-top: 10px;
    }
</style>


<footer class="footer">
    <div class="container">
        <div class="footer-columns">
            <div class="footer-column">
                <h3>À propos</h3>
                <p>Flowr est une plateforme simple et conviviale qui vous permet de créer, partager et organiser des
                    listes de cadeaux pour toutes les occasions.</p>
            </div>
            <div class="footer-column">
                <h3>Liens utiles</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('myAccount') }}">Mon compte</a></li>
                    <li><a href="{{ route('createGroup') }}">Crée un groupe</a></li>
                    <li><a href="{{ route('joinGroup') }}">Rejoindre un groupe</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Suivez-nous</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact</h3>
                <p>Email: contact@flowr.com</p>
                <p>Téléphone: +33 1 23 45 67 89</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Flowr. Tous droits réservés.</p>
        </div>
    </div>
</footer>
