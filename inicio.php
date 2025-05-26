<!DOCTYPE html>
<html lang="en">
    <?php
    include 'inicia_conexion.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Document</title>
</head>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Oswald:500');
        @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Vibur', cursive;
            font-family: 'Abel', sans-serif;
            background-color: #212121;
        }
        form {
            width: 450px;
            min-height: 500px;
            height: auto;
            border-radius: 5px;
            margin: 2% auto;
            box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
            padding: 2%;
            background-image: linear-gradient(-225deg, #4CAF50 50%,rgb(46, 58, 47) 50%);
        }
        form .con {
            display: -webkit-flex;
            display: flex;
          
            -webkit-justify-content: space-around;
            justify-content: space-around;
            align-items: center;
          
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            flex-direction:column;
            margin: 0 auto;
        }
        .head-form {
            margin: 2% auto 10% auto;
            text-align: center;
        }
        .head-form h2 {
            font-size: 290%;
            font-family: 'Playfair Display', serif;
            color: white;
        }
        .input-item {
            background: #fff;
            color: #333;
            padding: 14.5px 0px 15px 9px;
            border-radius: 5px 0px 0px 5px;
        }
        input[class="form-input"]{
            width: 240px;
            height: 50px;
          
            margin-top: 2%;
            padding: 15px;
            
            font-size: 16px;
            font-family: 'Abel', sans-serif;
            color: #5E6472;
          
            outline: none;
            border: none;
          
            border-radius: 0px 5px 5px 0px;
            transition: 0.2s linear;     
        }
        input[id="txt-input"] {width: 250px;}
        input[id="pwd"] {width: 250px;}
        input:focus {
            transform: translateX(-2px);
            border-radius: 5px;
        }
        .field-set{
          display: flex;
          align-items: center;
          flex-direction:column;
        }
        .button {
            display: inline-block;
            color: #252537;
          
            width: 280px;
            height: 50px;
          
            padding: 0 20px;
            background: #fff;
            border-radius: 5px;
            
            outline: none;
            border: none;
          
            cursor: pointer;
            text-align: center;
            transition: all 0.2s linear;
            
            margin: 7% auto;
            letter-spacing: 0.05em;
        }
        .submits {
            width: 48%;
            display: inline-block;
            float: left;
            margin-left: 2%;
        }
        .button:hover {
            transform: translatey(3px);
            box-shadow: none;
        }
        .button:hover {
            animation: ani9 0.4s ease-in-out infinite alternate;
        }
        @keyframes ani9 {
            0% {
                transform: translateY(3px);
            }
            100% {
                transform: translateY(5px);
            }
        }
        a{
            text-decoration: none;
        }
              
    </style>
    <body>
      <div class="overlay">
        <form class="login"  name="datos" method="post" action="verificar_cuenta.php">
          <div class="con">
          <header class="head-form">
              <h2>Log In</h2>
          </header>
          <br>
          <div class="field-set">
              <input class="form-input" id="txt-input" type="text" placeholder="DPI" name="dpi" required >
              <br>
              <input class="form-input" type="password" placeholder="Contraseña" id="pwd"  name="clave" required>
              <br>
              <input type="submit" value="Ingresar"  class="button" id="boton1">
              <br>
              <a href="crear_cuenta.php" class="button" id="boton2">Crear cuenta</a>
          </div>
          </div>
        </form>
      </div>
    </body>
</html>

