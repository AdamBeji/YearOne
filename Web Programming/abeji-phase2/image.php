<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    header('Content-type: image/jpeg');

    // Load And Create Image From Source
    $our_image = imagecreatefromjpeg('AdamEdit.jpg');

    // Allocate A Color For The Text Enter RGB Value
    $white_color = imagecolorallocate($our_image, 255, 255, 255);

    // Set Path to Font File
    $font_path = 'font/larabiefont.TTF';

    // Set Text to Be Printed On Image
    $text ="Welcome To Talkerscode";

    $size=20;
    $angle=0;
    $left=125;
    $top=200;
        
    // Print Text On Image
    imagettftext($our_image, $size,$angle,$left,$top, $white_color, $font_path, $text);

    // Send Image to Browser
    imagejpeg($our_image);

    // Clear Memory
    imagedestroy($our_image);

    ?>
</body>
</html>
