<?php
require '../config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('Products', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('description');
    $table->string('image');
    $table->integer('price');
    $table->integer('category_id');
    $table->timestamps();
});
