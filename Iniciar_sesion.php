<!DOCTYPE html>
<html>

<head>

    <title>Iniciar_sesion</title>

</head>

<body>
    <div>

        <?php


        function conectar($host, $usuario, $contasenia, $db)
        {


            $db = @mysqli_connect($host, $usuario, $contasenia, $db);

            return $db;
        }

        function desconectar($conexion)
        {

            if ($conexion) {

                $ok = @mysqli_close($conexion);

            }
        }

        $busqueda = strtolower($_POST["nom"]);
        $contra = strtolower($_POST["con"]);

        if ($busqueda == "" ||  $contra == "") {
            include("inicio.html");
        } else {

            $db = conectar('localhost', 'root', '', 'abd_games');

            $sql = "SELECT * FROM usuario WHERE id = '$busqueda'";

            $consulta = mysqli_query($db, $sql);
            $a = mysqli_num_rows($consulta);

            if ($a > 0) {

                $fila = mysqli_fetch_assoc($consulta);

                if ($fila['contrasenia'] != $contra) {
                    include ("inicio.html");
                    echo " <center><FONT SIZE=5 COLOR=  '#ff3300' > <p>Contraseña incorrecto</p></FONT> </center>";
                } else {
                    
                    include ("inicio.html");
                    echo " <center><FONT SIZE=5 COLOR=  '#ff3300' > <p> Acceso correcto</p></FONT> </center>";
                }
            } else {
                include ("inicio.html");
                echo " <center><FONT SIZE=5 COLOR=  '#ff3300' > <p>Usuario no encotrado</p></FONT> </center>";
            }



            $ok = mysqli_close($db);
        }



        ?>

    </div>

</body>

</html>