<?php

require_once 'config.php';

function connexion(){
    return new PDO(DSN, LOGIN, PASSWORD);
}   