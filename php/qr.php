<?php
//set it to writable location, a place for temp generated PNG files

//html PNG location prefix

include "../CodigoQR/phpqrcode/qrlib.php";    

//ofcourse we need rights to create temp dir

QRcode::png("Contenido");

echo '<img src=""';
?>