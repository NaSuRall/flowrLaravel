<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        font-family: "Poppins", serif;
    }
    /* Sidenav menu */
    .sidenav {
        height: 90%;
        width: 250px;
        position: fixed;
        top: 0;
        left: -215px;
        background-color: rgb(27, 111, 211);
        padding-top: 40px;
        transition: left 0.5s ease;
        margin-top: 20px;
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
        z-index: 4;
    }


    .sidenav a {
        padding: 10px 0;
        text-decoration: none;
        font-size: 25px;
        color: #ffffff;
        display: block;
        margin-top:10px;
        margin-right: 20px;
        margin-left: 10px;
        transition: 0.3s;
        position: relative;
        font-family: "Poppins", serif;
    }

    .sidenav a::after {
        content: "";
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: beige;
        transition: width 0.3s ease;
    }


    .sidenav a:hover::after {
        width: 100px;
    }

    .sidenav a:hover {
        color: #111;
    }

    .sidenav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }




    .sidenav:hover {
        left: 0;
    }


    .sidenav .close {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        display: none;
    }


    .burger-icon span {
        display: none;
        width: 35px;
        height: 5px;
        background-color: black;
        z-index: 2;
        margin-left: 20px;
    }

    #mySidenav img{
        height: 5em;
        width: 5em;
        margin-bottom: 40px;
        margin-left: 10px;
    }
    #fleche{
        display: flex;
        width: 40px;
        margin-left: 230px;
        font-size: 35px;
        background-color: rgb(27, 111, 211);
        border-bottom-right-radius: 20px;
        border-top-right-radius: 20px;
        color: white;
        padding: 10px 5px 10px 0px;
    }
</style>

<div id="mySidenav" class="sidenav">
    <img src="{{ asset('img/FlowrLogo1.png') }}"/>
    <a id="closeBtn" href="#" class="close">×</a>
    <div  id="navListe1" class="navListe">
        <ul>
            <li><a href="{{ route('home')}}">Accueil</a></li>
            <li><a href="{{ route('groups') }}">Gestion des groupes</a></li>
            <li><a href="{{ route('createGroup') }}">Créer  un groupe</a></li>
            <li><a href="{{ route('joinGroup') }}">Rejoindre un groupe</a></li>
        </ul>
    </div>
    <div id="fleche">
        ⮕
    </div>
    <div id="navListe2" class="navListe">
        <ul>
            @if(auth()->id())
            <li><a href="{{ url('myAccount')}}">Mon Compte</a></li>
            @else
            <li><a href="{{ url('login')}}">Se Connecter</a></li>
            @endif
            <li><a href="{{ url('contact-support') }}">Contact</a></li>
        </ul>
    </div>
    <div class="logout">
        @if(auth()->id())
        <a href="{{ route('logout') }}">Deconnexion</a>
        @endif
    </div>
</div>

<a href="#" id="openBtn">
  <span class="burger-icon">
    <span></span>
    <span></span>
    <span></span>
  </span>
</a>
