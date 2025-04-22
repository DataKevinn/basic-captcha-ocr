<?php
session_start();
$code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);
$_SESSION['captcha_code'] = $code;

$width = 180;
$height = 60;

$image = imagecreatetruecolor($width, $height);
$bg = imagecolorallocate($image, 28, 28, 30);
$text_color = imagecolorallocate($image, 240, 240, 240);
$line_color = imagecolorallocate($image, 80, 80, 80);
$noise_color = imagecolorallocate($image, 100, 100, 100);

imagefill($image, 0, 0, $bg);

// Linhas curvas
for ($i = 0; $i < 5; $i++) {
    imagearc(
        $image,
        rand(0, $width),
        rand(0, $height),
        rand($width / 2, $width),
        rand($height / 2, $height),
        rand(0, 360),
        rand(0, 360),
        $line_color
    );
}

// Ruído (pontos)
for ($i = 0; $i < 800; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $noise_color);
}

// Texto distorcido
$font = __DIR__ . '/fonts/arial.ttf'; // certifique-se que esse caminho é válido
$font_size = 24;
$x = 15;

for ($i = 0; $i < strlen($code); $i++) {
    $angle = rand(-30, 30);
    $y = rand(35, 50);
    $char = $code[$i];
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font, $char);
    $x += rand(22, 28);
}

imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR); // leve borrão

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>
