<?php

require 'Schema.php';


$S = new Schema();

$S->create("users", function($table){
    $table->INT("id")->autoinc()->default_value(0);
    $table->VARCHAR("username" ,250);
    $table->TEXT("bio")->nullable()->max(200);
})->generate();


