<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

function drawRating($rating)
{
    $width = 300;
    $height = 15;
    $ratingbar = (($rating / 100) * $width) - 2;
    $image = imagecreate($width, $height);
    $fill = ImageColorAllocate($image, 67, 219, 0);
    if ($rating > 74) {
        $fill = ImageColorAllocate($image, 233, 233, 0);
    }
    if ($rating > 89) {
        $fill = ImageColorAllocate($image, 197, 6, 6);
    }
    if ($rating > 100) {
        echo "Overload Error!";
        exit();
    }
    $back = ImageColorAllocate($image, 255, 255, 255);
    $border = ImageColorAllocate($image, 151, 151, 151);
    ImageFilledRectangle($image, 0, 0, $width - 1, $height - 1, $back);
    ImageFilledRectangle($image, 1, 1, $ratingbar, $height - 1, $fill);
    ImageRectangle($image, 0, 0, $width - 1, $height - 1, $border);
    imagePNG($image);
    imagedestroy($image);
}
Header("Content-type: image/png");
drawRating($_GET['rating']);

?>