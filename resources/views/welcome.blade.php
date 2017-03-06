<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Arroyo 74</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #BAF0F0;
                color: #04212F;
                font-family: 'courier', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <img src="../../Desktop/diente.jpg"
             alt="Diente feliz"
             title="Imagen de un diente feliz"
         />

        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                        <a href="{{ url('/login') }}">ID_Personal</a>
                        <a href="{{ url('/register') }}">Contraseña</a>

                </div>


            <div class="content">
                <div class="title m-b-md">
                    Clinica Dental Arroyo 74
                </div>

                <?php
                    $objetivos = ["1" => "Modernización de la aplicación web actual" , "2" => "Mejora de la usabilidad de la aplicación" , "3" => "Mejora de la intuitividad de la página"]
                ?>
                <table style="position:absolute;top:100px;left:45px">
                    <tr>
                        <th> Número de objetivo</th>
                        <th> Objetivo </th>
                    </tr>
                    <?php
                        foreach($objetivos as $numero => $objetivo){
                    ?>
                    <tr>
                        <td>
                            <?php echo $numero ?>
                        </td>
                        <td>
                            <?php echo $objetivo ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>

                <?php
                $alumnos = ["González Gómez, Manuel" => "mangonzas96@gmail.com" , "González Sánchez, Celia" => "celiags250396@gmail.com"]
                ?>
                <table style="position:absolute;top:100px;right:45px">
                    <tr>
                        <th> Apellidos, nombre </th>
                        <th> Correo</th>
                    </tr>
                    <?php
                    foreach($alumnos as $apn => $correo){
                    ?>
                    <tr>
                        <td>
                            <?php echo $apn ?>
                        </td>
                        <td>
                            <?php echo $correo ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                <div class="links">
                    <a href="https://laravel.com/docs">Pacientes</a>
                    <a href="https://laravel-news.com">Personal sanitario</a>
                    <a href="https://forge.laravel.com">Personal extra</a>
                    <a href="http://php.net/manual/es/langref.php">Gabinetes</a>
                    <a href="https://www.mysql.com/products/workbench/">Citas del día</a>
                </div>
            </div>
        </div>
    </body>
</html>
