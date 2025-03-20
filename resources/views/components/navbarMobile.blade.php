<style>
   /* @import "/public/css/navbarMobile.css"; */
    /* Responsive */

    /* Styles du menu burger */
    .navbar {
        display: flex;
        position: fixed;
        top: 0;
        left: 20px;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        z-index: 2;
    }

    .burger-btn {
        font-size: 50px;
        color: #000000;
        background: none;
        border: none;
        cursor: pointer;
    }

    .menu {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(0, 0, 0);
        justify-content: center;
        align-items: center;
        transform: translateY(-100%);  /* Cache le menu au-dessus de l'écran */
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease; /* Animation pour l'apparition */
        z-index: 1000;
    }

    .menu.open {
        display: flex;
        transform: translateY(0); /* Fait apparaître le menu */
        opacity: 1; /* Fait apparaître le menu en augmentant l'opacité */
    }

    .menu ul {
        list-style: none;
        padding: 0;
    }

    .menu ul li {
        margin: 20px 0;
    }

    .menu ul li a {
        color: white;
        text-decoration: none;
        font-size: 24px;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 30px;
        color: white;
        background: none;
        border: none;
        cursor: pointer;

    }

    /* Afficher la nav quand elle est ouverte */
    .menu.open {
        display: flex;
    }

    @media (min-width: 1100px) {
        .navbar{
            display: none;
        }

    }
    @media (min-width: 1300px) {
        .burger-btn {
            display: none;
        }
        .menu {
            display: flex;
            position: static;
            height: auto;
            background-color: transparent;
            transform: none; /* Pas d'animation sur les écrans plus grands */
            opacity: 1;
            z-index: 1000;
        }
        .menu ul {
            display: flex;
        }
        .menu ul li {
            margin: 0 15px;
        }
        .menu ul li a {
            font-size: 18px;
            color: #333;
        }
    }

</style>
<div class="navbar">
    <button class="burger-btn" id="burger-btn">&#9776;</button>
    <nav id="menu" class="menu">
        <button class="close-btn" id="close-btn">&times;</button>
        <ul>
            <li><a href="{{ route('home')}}">Accueil</a></li>
            <li><a href="{{ route('groups') }}">Gestion des groupes</a></li>
            <li><a href="{{ route('createGroup') }}">Créer  un groupe</a></li>
            <li><a href="{{ route('joinGroup') }}">Rejoindre un groupe</a></li>

            @if(auth()->id())
                <li><a href="{{ url('myAccount')}}">Mon Compte</a></li>
            @else
                <li><a href="{{ url('login')}}">Se Connecter</a></li>
            @endif
            <li><a href="{{ url('contact-support') }}">Contact</a></li>

            @if(auth()->id())
                <a href="{{ route('logout') }}">Deconnexion</a>
            @endif
        </ul>
    </nav>
</div>
