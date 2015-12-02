<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 21.10.2015
 * Time: 0:00
 */
// 1. �������� �����������
//$image = imagecreate(500, 500);
$image = imagecreatetruecolor(500, 300);

// 2. ����������� �����������
//header("Content-type: image/gif");
//imagegif($image);
//header("Content-type: image/jpg");
//imagejpeg($image);
//header("Content-type: image/png");
//imagepng($image);

// 3. ��������� �������� � ������
//header("Content-type: image/gif");
//imagegif($image, 'test.gif');

// 4. ������
//header("Content-type: image/jpg");
//imagejpeg($image, null, 75);

// 5. ���������� � ������
// ��������� ������� ����������� ��� ���
imageantialias($image, true);

// 6. �������
$red = imagecolorallocate($image, 255, 0, 0);
//$white = imagecolorallocate($image, 255, 255, 255);
$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$gray = imagecolorallocate($image, 195, 195, 195);

// ������ ���� - ���� ���� ������ ��� �������� ��������� �������� imagecreate.
// ���� ������� �������� � ������� imagecreatetruecolor, �� ���������� ��������� ��� ������.

// 7. ������� �����
imagefill($image, 0, 0, $green);

// 8. ������������ �����
//imagecolortransparent($image, $red);

// 9. ����������� �������
imagesetpixel($image, 50, 50, $red);

// 10. �����
imageline($image, 20, 50, 80, 280, $red); // ��������� antialias � ���������
imageline($image, 80, 50, 20, 280, $red); // ��������� antialias � ���������

// 11. ��������� �������������
imagerectangle($image, 20, 50, 80, 280, $blue);

// 12. ������� �������������
//imagefilledrectangle($image, 20, 50, 80, 280, $blue);

// 13. �������������
$points = array(0, 0, 100, 200, 300, 200, 200, 100);
imagepolygon($image, $points, 4, $gray);
//imagefilledpolygon($image, $points, 4, $gray);

// 14. ������
imageellipse($image, 200, 150, 300, 200, $red);
//imagefilledellipse($image, 200, 140, 300, 200, $red);

// 15. ����
imageArc($image, 210, 160, 300, 200, 0, 90, $black);
imagefilledarc($image, 230, 160, 300, 200, 0, 35, $gray, IMG_ARC_PIE);
imagefilledarc($image, 230, 160, 300, 200, 45, 90, $red, IMG_ARC_CHORD);
imagefilledarc($image, 230, 160, 300, 200, 100, 135, $blue, IMG_ARC_EDGED);
imagefilledarc($image, 230, 160, 300, 200, 150, 210, $blue, IMG_ARC_ROUNDED);
imagefilledarc($image, 230, 160, 300, 200, 200, 230, $blue, IMG_ARC_NOFILL);

// 16. �����
imagestring($image, 5, 350, 100, 'PHP5', $black); // ������� ����
imagechar($image, 4, 350, 120, 'PHP5', $black);
imagecharup($image, 4, 350, 80, 'PHP5', $black);
// ������, �����, ������, x, y, ����, ���� �� �������, �����
imagettftext($image, 30, 10, 300, 150, $red, 'arialn.ttf', 'PHP5');

// 16. �������� ��������
//$im = imagecreatefromgif('test.gif');

// 17. ��������� �������
imagesetthickness($image, 5);

// 18. ������������� ������
//imagesetstyle($image, array());

// ������

// ����� �����������
header("Content-type: image/gif");
imagegif($image);