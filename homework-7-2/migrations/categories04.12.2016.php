<?php
require '../config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('Categories', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->timestamps();
});
