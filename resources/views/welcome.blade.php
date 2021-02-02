<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coliseu</title>

        <style>
            body{
                margin: 0;
                font-family: 'Work Sans', sans-serif;
                background-color: #CDC9C9;
                background-image: url("sdc.jpg");
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

            }
            .container{
                width: 80%;
                margin: 0 auto;
            }
            header{
                background: #4682B4;
            }
            header::after{
                content: '';
                display: table;
                clear: both;
            }
            .logo{
                float: left;
                width: 6.4%;
                height: 10%;
            }
            nav{
                float: right;
            }
            nav ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            nav li{
                display: inline-block;
                margin-left: 70px;
                padding-top: 25px;
                position: relative;
            }
            nav a{
                color: white;
                text-decoration: none;
                font-size: 100%;

            }
            nav a:hover{
                text-shadow: 1.75px 2px 3px #87CEEB;
            }
            h1{
                text-align: center;

                justify-content: center;
                font-weight: 700;
                line-height: 325px;
                font-size: 45px;
                color:White;
            }
            p{
                text-align: center;
                margin-top:100px;
            }
            .button1{
                line-height: 24px;
                cursor: pointer;
                font-weight: 500;
                display: inline-flex;
                text-decoration: none;
                background-color:  #4682B4 ;
                color: white;
                border-radius: 28px;
                font-size: 20px;
                margin-right: 10px;
                padding: 16px 32px;
            }
            .button1:hover{
                background-color: #131313;
                box-shadow: 2px 2px 4px #888888;
            }
            .button2{
                line-height: 24px;
                cursor: pointer;
                font-weight: 500;
                display: inline-flex;
                background-color:  #4682B4;
                text-decoration: none;
                color: white;
                border-radius: 28px;
                font-size: 20px;
                margin-left: 10px;
                padding: 16px 32px;
            }
            .button2:hover{
                background-color: #131313;
                box-shadow: 2px 2px 4px #888888;
            }
        </style>

    </head>
    <body>
        <header>
            <div class="container">
                <a href="/"><img src="dark.png" alt="logo" class="logo"></a>
                <nav>
                    <ul>
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <h1>Marque o Seu Treino em Nossa Academia</h1>
        <p>
            <a href="{{ route('login') }}" class="button1">Marcar Treino</a>
            <a href="{{ route('login') }}" class="button2">Acompanhar Ficha de Treino</a>
        </p>
    </body>
</html>
 