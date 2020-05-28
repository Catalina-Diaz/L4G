<?php
    if(isset($_POST['host'])){
        
        $file = fopen("includes/config.php", "w"); 

        fwrite($file, "<?php" . PHP_EOL);
        fwrite($file, "define('HOST', '" . $_POST['host'] ."');" . PHP_EOL);
        fwrite($file, "define('USER', '" . $_POST['user'] ."');" . PHP_EOL);
        fwrite($file, "define('PASSWORD', '" . $_POST['password'] ."');" . PHP_EOL);
        fwrite($file, "define('DB', '" . $_POST['db'] ."');" . PHP_EOL);
        fwrite($file, "?>");

        fclose($file);

        echo "Creando archivo de conexion";

        //Importar la BD - sql
        $sql = file_get_contents('includes/bd.sql');

        include('includes/db.php');
        
        if(DB::getConnection()->multi_query($sql)){
            //  TRUE
            echo "Se importó correctamente la BD";
            //unlink('install.php');
            //header('Location: index.php');
        }else{ //FALSE
            echo "No se ha podido importar la BD";
        }

        die;
    }
?>
