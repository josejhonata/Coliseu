
        <title>Coliseu</title>

        <style>
            body{
                margin: auto;
                font-family: 'Work Sans', sans-serif;
                background-image: url("sdc.jpg");
                border-image: 1px solid black;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

            }
            .container{
                width: 100%;
            }
            header{
                background: #000000;
            }
            header::after{
                content: '';
                display: table;
                clear: both;
            }
            .logo{
                float: auto;
                width: 4.7%;
                height: 10%;
            }
            nav{
                float: right;
            }
            nav ul{
                float: right;
                margin: 0px;
                padding: -0;
                list-style: none;
            }
            nav li{

                display: inline-block;
                margin-left: 7px;
                padding-top: 9px;
                position: relative;
            }
            nav a{
                margin: auto;
                color: white;
                text-decoration: none;
                font-size: 10%;

            }
            nav a:hover{
                text-shadow: 1.75px 2px 3px ;
            }
            h1{
                text-align: center;
                justify-content: center;
                font-weight: 70px;
                line-height: 100px;
                font-size: 45px;
                color:White;
                text-shadow: 2px 2px 5px black;
            }
            .tx1{

                margin-bottom:11%;
                margin-top:10px;
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
                background-color:  #d85c23;
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
                background-color:  #d85c23;
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
            .button {

                        border: none;
                        font-size: 20px;
                        cursor: pointer;
                        padding: 10px 22px;
                        text-align: center;
                        text-decoration: none;
                        outline: none;
                        display: inline-block;
                        color: white;
                        background-color:black;
                        border: none;
                        border-radius: 14px;


            }

            .button:hover {
                background-color: white;
                color:#d85c23;
                text-shadow: 2px 2px 5px #d85c23;
            }

            .button:active {transform: translateY(9px);}

            img{
                position: absolute;
                right: 90%;
                justify-items: auto;
                width: 60px;
            }
            .tx1{
                padding: 6%;
            }
        </style>

    </head>
    <body>
        <header>
            <div class="container">
                <a href="/" ><img class="h-14 " src="{{ asset('dark.png') }}" /></a>
                <nav>
                     <ul>
                        <li><a href="{{ route('login') }}" class="button">Entrar</a></li>
                        <li><a href="{{ route('register') }}" class="button">Cadastre-se</a></li>
                    </ul>
                </nav>
            </div>
        </header>
       <div class="tx1">
           <h1>Marque o Seu Treino em Nossa Academia</h1>
        </div>

        <p style=" margin-bottom:20%;">
            <a href="{{ route('login') }}" class="button1">Marcar Treino</a>
            <a href="{{ route('login') }}" class="button2">Acompanhar Ficha de Treino</a>
        </p>

    </body>
</html>
 