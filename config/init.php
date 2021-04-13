<?php 
require 'function.php';
$DB = new DB(); // On initialise l'objet qui contient notre accès à la base de donnée.
$basket = new basket($DB); // On initialise l'objet qui gère l'ajout panier.