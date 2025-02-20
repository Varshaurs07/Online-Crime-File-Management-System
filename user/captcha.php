<?php
// Retrieve the code parameter from the query string
$code = isset($_GET['code']) ? $_GET['code'] : '';

// Create an image with a gray background
$im = imagecreatetruecolor(100, 30);
$bgColor = imagecolorallocate($im, 192, 192, 192); // RGB values for gray
imagefilledrectangle($im, 0, 0, 100, 30, $bgColor);

// Set the text color to white
$textColor = imagecolorallocate($im, 255, 255, 255); // RGB values for white

// Calculate the position to center the text
$textWidth = imagefontwidth(5) * strlen($code); // Width of the text for the chosen font size (5) times the number of characters
$textHeight = imagefontheight(5); // Height of the text for the chosen font size (5)
$x = (100 - $textWidth) / 2; // Calculate the x-coordinate to center the text
$y = (30 - $textHeight) / 2; // Calculate the y-coordinate to center the text

// Write the code on the image
imagestring($im, 5, $x, $y, $code, $textColor);

// Set the content type to PNG
header('Content-Type: image/png');

// Output the image
imagepng($im);

// Free up memory
imagedestroy($im);
?>
