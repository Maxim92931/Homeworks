<?php
    require '../vendor/autoload.php';


    $manager = new \Intervention\Image\ImageManager(array('driver' => 'gd'));
    $img = $manager->make("1.png");

    $img->insert('watermark.png');

    $img->resize(200, nuul, function ($img) {
       $img->aspectRatio();
    })->rotate(45);



    $img->save("2.png");