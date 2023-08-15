<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Partes Digital - HMPP</title>
    <style>
        *{
            margin:0;
            box-sizing: border-box;
            padding:0;
            font-family:sans-serif;
        }
        .header{
            width: 100%;
            padding: 5% 0;
        }
        .header-blue{
            background-color: #2d5593;
        }
        .container{
            display:flex;
            justify-content:center;
        }
        .content{
            width:70%;
            padding:3% 5%;
            box-shadow: 0px 21px 38px -21px rgba(0,0,0,0.38);
            margin:-5% 0;
            background-color:white;
        }
        .content-header{
            display:flex;
            justify-content:start;
        }
        .logo{
            width:25%;
            padding:.5% 3%;
        }
        .title{
            margin:2% 3%;
            color:#2d5593;
            letter-spacing:.20em;
            word-spacing:.15em;
        }
        .title-digital{
            font-weight:bold;
            font-size:1em;
            letter-spacing:.20em;
        }
        hr{
            border-left:1px solid #2d5593;
        }
        .email-content{
   
        }
        .title-muni{
            font-weight:bold;
            font-size:1.5em;
        }
        .list{
            margin:2% 10%;
        }
        .btn{
            padding:2%;
            margin:5% 0;
            background-color:#f6971d;
            color:black;
            font-weight:bold;
            text-decoration:none;
            display:flex;
            width:50%;
            justify-content:center;
        }
        .btn:hover{
            background-color:#ea8215;
        }
    </style>
</head>
<body>
    <div class="header header-blue">
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="content">
                <div class="content-header">
                    <hr>
                    <h4 class="title">MESA DE PARTES <br><span class="title-digital">DIGITAL</span></h4> 
                </div>
                <br><br>
                <p class="email-content">
                    Reciba los cordiales saludos a nombre de la <br><br>
                    <span class="title-muni">HONORABLE MUNICIPALIDAD PROVINCIAL DE PASCO </span><br><br>
                    por este medio le hacemos entrega de las credenciales de acceso para la mesa de partes digital
                        <ul class="list">
                            <li>Usuario:<b>{{$user}}</b></li>
                            <li>Contraseña:<b>{{$pass}}</b></li>
                        </ul>
                </p>
                <p class="email-content">
                    Ingrese al siguiente link con las credenciales mencionadas anteriormente.
                </p>
                <a href="https://pladig.munipasco.gob.pe/portal-Web/login.xhtml" class="btn btn-primary" target="_blank">MESA DE PARTES DIGITAL</a>
                <p><b>Honorable Municipalidad Provincial de Pasco - Un futuro diferente "Gestion Edil 2023-2026"</b></p>
            </div>
        </div>
    </div>
    <div class="footer">

    </div>
</body>
</html>