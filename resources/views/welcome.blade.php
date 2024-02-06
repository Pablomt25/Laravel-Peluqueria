<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Peluqueria</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bilbo+Swash+Caps&family=Montserrat:wght@200;300;400;500;600;700&display=swap');

:root {
    --main-color: #f0c21b;
    --secundary-color: #1a4657;
    --white-color: #fff;
    --text-gray: #2d2d2d;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html {
    font-size: 10px;
    font-family: 'Montserrat', sans-serif;
    scroll-behavior: smooth;
}

.container {
    width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Nav Bar */
#nav-bar {
    width: 100%;
    height: auto;
    background-color: black;
    position: fixed;
    z-index: 100;  
}

.nav-bar {
    background-color: black;
    left: 0;
    top: 0;
    padding: 1rem 5rem;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav-bar .brand a {
    font-family: 'Bilbo Swash Caps', sans-serif;
    font-size: 3rem;
    text-decoration: none;
    color: var(--white-color);
}

.nav-bar .brand2 a {
    font-size: 3rem;
    text-decoration: none;
    color: var(--white-color);
}

.nav-bar .nav-list {
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-bar .nav-list .hamburger {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    transition: .3s ease all;
    cursor: pointer;
}

.nav-bar .nav-list .hamburger.active {
    transform: rotate(360deg);
}

.nav-bar .nav-list .hamburger.active .bar:before {
    top: 0;
    transform: rotate(45deg);
}

.nav-bar .nav-list .hamburger.active .bar:after {
    top: 0;
    transform: rotate(-45deg);
}

.nav-bar .nav-list .hamburger.active .bar {
    background-color: transparent;
}

.nav-bar .nav-list .hamburger .bar {
    width: 30px;
    height: 2px;
    background-color: var(--white-color);
    position: relative;
    display: flex;
}

.nav-bar .nav-list .hamburger .bar::before,
.nav-bar .nav-list .hamburger .bar::after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--white-color);
    transition: .3s ease all;
}

.nav-bar .nav-list .hamburger .bar::before {
    top: 8px;
}

.nav-bar .nav-list .hamburger .bar::after {
    bottom: 8px;
}

.nav-bar .nav-list ul {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    background-color: rgb(46, 45, 45);
    padding: 5rem 0;
    transform: translateY(-100%); 
    transition: .3s ease transform;
    text-align: center;
    z-index: -1;
}

.nav-bar .nav-list ul li {
    list-style: none;
    display: block;
    padding: 1rem 0;
    position: relative;
}

.nav-bar .nav-list ul li:hover:after {
    transform: translateX(-50%) scale(1);
}

.nav-bar .nav-list ul li:after {
    content: '';
    position: absolute;
    width: 5rem;
    height: .2rem;
    background-color: var(--white-color);
    left: 50%;
    transform: translateX(-50%) scale(0);
    bottom: 0;
    transition: .3s ease transform;
}

.nav-bar .nav-list ul li a {
    font-size: 1.8rem;
    font-weight: 600;
    text-decoration: none;
    text-transform: uppercase;
    color: var(--white-color);
    display: block;
    letter-spacing: .15rem;
    padding: 2rem 3rem;
}

.nav-bar .nav-list.open ul {
    transform: translateY(90px);
}
/* End Nav Bar */

/* Home Section */
.home {
    min-height: 80vh;
    width: 100%;
    padding-top: 50px;
    justify-content: center;
    display: flex;
    flex-direction: column-reverse;
    justify-content: center;
    align-items: center;
    background-color: black;
}

.home .home-info {
    width: 100%;
    text-align: center;
}

.home .home-info .home-info-heading {
    font-size: 5rem;
    text-transform: capitalize;
    font-weight: 500;
    color: var(--white-color);
}

.home .home-info .home-info-subheading {
    font-size: 1.6rem;
    text-transform: uppercase;
    letter-spacing: .5rem;
    color: var(--white-color);
}

.home .home-info .home-info-button {
    margin-top: 30px;
    margin-bottom: 30px;
    padding: 2rem 5rem;
    display: inline-block;
    font-size: 1.6rem;
    text-transform: uppercase;
    color: var(--white-color);
    text-decoration: none;
    letter-spacing: .6rem;
    background-color: var(--text-gray);
}

.home .home-img {
    width: 80%;
    height: auto;
    margin-bottom: 3rem;
}

.home .home-img img {
    height: 100%;
    width: 100%;
}
/* End Home Section */

/* About Section */
.about {
    width: 100%;
    min-height: 50vh;
    padding: 10rem 5rem;
    flex-direction: column;
}

.about .about-info {
    text-align: center;
}

.about .about-info .about-info-heading {
    font-size: 4rem;
    text-transform: uppercase;
    letter-spacing: .3rem;
    color: black;
}

.about .about-info .about-info-desc {
    font-size: 1.3rem;
    line-height: 2rem;
    margin-top: 10px;
}

.about .about-info .about-info-button {
    padding: 1.6rem 2.6rem;
    display: inline-block;
    background-color: var(--text-gray);
    color: var(--white-color);
    text-decoration: none;
    font-size: 1.6rem;
    text-transform: uppercase;
    letter-spacing: .2rem;
    margin-top: 20px;
    margin-bottom: 20px;
}

.about .about-info .about-info-button:hover {
    background-color: black;
}

.about .about-img .about-img-wrapper {
    margin-top: 50px;
    height: auto;
    max-width: 400px;
    position: relative;
    display: inline-block;
}

.about .about-img .about-img-wrapper img {
    height: 100%;
    width: 100%;
}

.about .about-img .about-img-wrapper::after {
    position: absolute;
    content: '';
    right: -5rem;
    top: 50%;
    transform: translateY(-50%);
    width: 70%;
    height: 120%;
    background-color: rgba(24, 24, 24, 0.158);
    z-index: -1;
} 
/* End About Section */

/* Services Section */
.services {
    flex-direction: column;
    min-height: 60vh;
    padding: 10rem 5rem;
}

.services .services-header {
    width: 100%;
    text-align: center;
}

.services .services-header .services-header-heading {
    font-size: 4rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: black;
}

.services .services-header .services-header-desc {
    font-size: 1.3rem;
    line-height: 2rem;
    margin-top: 20px;
}

.services .services-info {
    margin-top: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    flex-direction: column;
}

.services .services-info .service {
    width: 100%;
    min-height: 300px;
    position: relative;
    transition: .3s ease transform;
    margin: 5px;
}

.services .services-info .service .service-card {
    position: absolute;
    height: 100%;
    width: 100%;
    transform-style: preserve-3d;
    transition: .3s ease transform;
    display: block;
}

.services .services-info .service .service-card .service-front,
.services .services-info .service .service-card .service-back {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    backface-visibility: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.13);
    padding: 10px;
}

.services .services-info .service .service-card .service-back {
    transform: rotateY(180deg);
}

.services .services-info .service .service-card .service-front i {
    font-size: 4rem;
    color:  black;
    margin-bottom: 10px;
}

.services .services-info .service .service-card .service-front .service-front-heading,
.services .services-info .service .service-card .service-back .service-back-heading{
    font-size: 2.5rem;
    text-transform: capitalize;
}

.services .services-info .service:hover .service-card {
    transform: rotateY(180deg);
}

.services .services-info .service .service-card .service-back .service-back-desc {
    font-size: 1.3rem;
    margin-top: 10px;
    text-align: center;
}

.services .services-info .service:nth-child(2) .service-card .service-front {
    background-image: url(./img/img3.jpg);
    background-size: cover;
    position: relative;
    color: var(--white-color);
}

.services .services-info .service:nth-child(2) .service-card .service-front::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.274);
    z-index: -1;
}

.services .services-info .service:nth-child(2) .service-card .service-front i {
    color: var(--white-color);
}
/* End Services Section */

/* Hire Section */
.hire {
    min-height: 10vh;
    flex-direction: column;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.212);
    padding: 3rem 2rem;
}

.hire .hire-heading {
    color: black;
    font-size: 2.2rem;
    text-align: center;
}

.hire .hire-button {
    padding: 2rem 3rem;
    display: inline-block;
    background-color: var(--text-gray);
    font-size: 1.6rem;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: .2rem;
    margin-top: 10px;
    color: var(--white-color);
    transition: .3s ease background-color;
}

.hire .hire-button:hover {
    background-color: black;
} 
/* End Hire Section */

/* Footer Section */
    .footer {
        min-height: 20vh;
        width: 100%;
        background-color: black;
        color: var(--white-color);
        flex-direction: column;
        text-align: center;
        padding: 5rem;
    }

    .footer .footer-contact {
        padding: 20px;
    }

    .footer .footer-contact .footer-contact-heading {
        font-size:  2.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .footer .footer-contact .footer-contact-info {
        font-size: 1.4rem;
        padding-top: 10px;
        letter-spacing: .2rem;
    }

    .footer .footer-social-follow .footer-social-icon a {
        color: var(--white-color);
        font-size: 2.2rem;
        margin: .4rem;
        display: inline-block;
    }

    .footer .footer-social-follow .footer-social-icon a:hover {
        color: rgb(224, 224, 224);
    }

    .footer-bottom {
        margin-top: 3rem;
        padding: 20px 0;
        text-align: center;
    } 

    .footer-bottom p {
        font-size: 14px;
        word-spacing: 2px;
        text-transform: capitalize;
    }

    .footer-bottom p a {
        color: #fff;
        text-transform: capitalize;
        text-decoration: none;
        opacity: .4;
        font-weight: 200;
    }
/* End Footer Section */

/* Responsive - Desktop / Tablet */
@media only screen and (min-width: 768px) {
    .nav-bar .nav-list .hamburger {
        display: none;
    }

    .nav-bar {
        width: 80%;
    }

    .nav-bar .nav-list ul {
        transform: translateX(0);
        position: initial;
        padding: 0;
        z-index: initial;
        background-color: transparent;
    }

    .nav-bar .nav-list ul li {
        display: inline-block;
    }

    .home {
        height: 100vh;
        flex-direction: row;
        padding-left: 10%;
        justify-content: center;
        align-items: center;
    }

    .home .home-info {
        max-width: 30%;
        text-align: left;
    }

    .home .home-info .home-info-subheading {
        font-size: 1.3rem;
        letter-spacing: .5rem;
    }

    .home .home-img {
        min-width: 400px;
        max-width: 1000px;
    }

    .about {
        width: 80%;
        margin: 0 auto;
        flex-direction: row;
    }

    .about .about-info {
        width: 50%;
        text-align: left;
        padding-right: 17rem;
    }

    .services .services-header .services-header-desc {
        max-width: 500px;
        padding-top: 20px;
        margin: 0 auto;
    }

    .services .services-info {
        flex-direction: row;
        width: 80%;
    }

    .services .services-info .service {
        margin: 0;
    }
}

/* Responsive - Desktop */
@media only screen and (min-width: 1200px) {
    .home .home-info .home-info-heading {
        font-size: 6rem;
    }

    .home .home-info .home-info-subheading {
        letter-spacing: .8rem;
    }
}
    </style>
    </head>
    <body>
    <!-- nav-bar -->
        <section id="nav-bar" class="container">
            <header class="nav-bar">
                <div class="brand"><a href="#"><h1>Barberia</h1></a></div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        @if (Route::has('login'))
                <div class="brand2 sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                    </ul>
                </div>
            </header>
        </section>
    <!-- End nav-bar -->
    
    <!-- Home Section -->
    <section id="home" class="home container">
        <div class="home-info">
            <h1 class="home-info-heading">La mejor barbería</h1>
            <a href="{{ route('login') }}" class="home-info-button">
                <div>    
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">PIDE TU CITA!</h2>
                </div>
            </a>
        </div>
        <div class="home-img">
            <img src="./img/img.png" alt="máquina de cortar cabelo">
        </div>
    </section>


    <section id="about" class="about container">
        <div class="about-info">
            <h1 class="about-info-heading">Sobre Nosotros</h1>
            <p class="about-info-desc">
                En esta barbería, no solo cortamos cabello, creamos experiencias inolvidables. Somos más que una barbería; somos un destino donde la tradición se encuentra con la modernidad, y la elegancia se combina con la autenticidad.
            </p>
            <a href="#hire" type="button" class="about-info-button">Contato</a>
        </div>
        <div class="about-img">
            <div class="about-img-wrapper">
                <img src="./img/barberia.jpg" alt="Padrin">
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Service Section -->
        <section id="services" class="services container">
            <div class="services-header">
                <h1 class="services-header-heading">Servicios</h1>
                <p class="services-header-desc">
                    Confira abaixo os serviços desejados e aproveite todas as vantagens de um agendamento prático e muito rápido. Realizo corte em domicílio, sempre preocupado em deixar o cliente mais à vontade possível.
                </p>
            </div>
            <div class="services-info">
                <div class="service">
                    <div class="service-card">
                        <div class="service-front">
                            <i class="fas fa-brush"></i>
                            <h1 class="service-front-heading">Tingimento</h1>
                        </div>
                        <div class="service-back">
                            <h1 class="service-back-heading">Tingimento</h1>
                            <p class="service-back-desc">Esse é perfeito para você que gosta de ousar! 
                                Rosa, azul, platinado, é só dizer que eu farei para você. Realizo esse tipo de serviço sempre usando 
                                as melhores tintas e descolorantes, mas, se o cliente preferir, pode trazer sua própria sem problemas! O importante é ser quem você quiser ser.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service">
                    <div class="service-card">
                        <div class="service-front">
                            <i class="fas fa-cut"></i>
                            <h1 class="service-front-heading">Corte</h1>
                        </div>
                        <div class="service-back">
                            <h1 class="service-back-heading">Corte</h1>
                            <p class="service-back-desc">Tá querendo dar uma repáginada no estilo? Corta com o Padrin! 
                                Garantia de um pézinho bem feito, cuidado e atenção nos maiores detalhes para você ficar mais 
                                que satisfeito! Corte americano, riscas de navalha, moicano, o que você desejar. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service">
                    <div class="service-card">
                        <div class="service-front">
                            <i class="fas fa-air-freshener"></i>
                            <h1 class="service-front-heading">Barba</h1>
                        </div>
                        <div class="service-back">
                            <h1 class="service-back-heading">Barba</h1>
                            <p class="service-back-desc">Uma barba bem feita e cuidada está mais que em alta nos tempos modernos. 
                                Faça a sua barba comigo e evite que a pele fique irritada, o crescimento de pelos encravados, cortes ou o 
                                surgimento de manchas vermelhas. Só o Padrin para ter esse cuidado com você!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer id="footer" class="footer container">
            <div class="footer-contact">
                <h1 class="footer-contact-heading">Contacto</h1>
                <p class="footer-contact-info">Gmail: barberia@gmail.com</p>
                <p class="footer-contact-info">Teléfono: (+34) 342456982</p>
            </div>
            <div class="footer-social-follow">  
            </div>
            <div class="footer-bottom">
                <p>copyright &copy; 2024 Pablo Moreno Tirado | Pablo López Lozano | Raúl González Díaz</p>
            </div>
        </footer>

</body>
</html>
