<html>
    <head><title>Koneksi</title></head>
    <body>
        
        <?php

        if(!isset($_SESSION)){
            session_start();
        }

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'coftea';

        $koneksi = mysqli_connect($host,$user,$pass,$database);

        if ($koneksi->connect_error){
            die("Koneksi Gagal".$koneksi->connect_error);
        } else 
        
        ?>
    </body>
</html>