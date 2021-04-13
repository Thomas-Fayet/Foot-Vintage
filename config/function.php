<?php

// Création de la classe permetant de gérer l'appel à la base de donnée ainsi que les requêtes

class DB {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'foot-vintage';
    public $db;

    //  création de la fonction construct : permet d'avoir une classe (DB) avec une configuration par défaut 
    //  mais qui peut aussi être utilisée pour se connecter à une autre base de données.

    public function __construct($host = null, $username = null, $password = null, $database = null) {
        if ($host != null) {
            $this -> host = $host;
            $this -> username = $username;
            $this -> password = $password;
            $this -> database = $database;
        }

        try { //on essaie le code...
            $this -> db = new PDO('mysql:host=' .$this -> host.';port=3306;dbname=' .$this -> database, $this -> username, $this -> password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
        } catch (PDOException $e) { //...en cas d'erreur on la capture
            die('<ul><li>Erreur sur le fichier : ' . $e->getFile() . '</li><li>Erreur à la ligne ' . $e->getLine() . '</li><li>Message d\'erreur : ' . $e->getMessage() . '</li></ul>');
        }
        
    }

    // Création d'une méthode pour réaliser les requêtes plus rapidement
    // la fonction query prendra en paramètre la requête à faire que l'on stockera dans la variable $sql.

    public function query($sql, $data = array()) {
        $req = $this -> db -> prepare($sql);
        $req -> execute($data);
        return $req -> fetchAll(PDO::FETCH_ASSOC); // permet d'avoir le résultat sous forme d'objet.
    }
}

// Création de la classe permettant de gérer l'ajout panier

class basket {

    private $DB;
    
    public function __construct($DB) {

        if (!isset($_SESSION)) {
            session_start(); // On initialise la session
        }

        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array(); // On créer la session panier qui est un panier vide. on la stock dans une varible de type tableau.
        }
        $this -> DB = $DB;

        if (isset($_POST['basket']['quantity'])) {
            $this -> recalc();
        }
    }

    // Création de la fonction qui permet de prendre en compte le changement de quantité des produits au niveau du panier
    public function recalc() {
        foreach ($_SESSION['basket'] as $id_product => $quantity) {
            if (isset($_POST['basket']['quantity'][$id_product])) {
                $_SESSION['basket'][$id_product] = $_POST['basket']['quantity'][$id_product]; // permet d'actualiser la quantité et le prix total
            }
        }
    }

    //Création de la fonction permettant d'afficher le prix total 
    public function price_total() {
        $total = 0;
        $ids = array_keys($_SESSION['basket']); // permet de récupérer les clés de la session basket, dans notre cas les id.

        if (empty($ids)) {
            $products = array(); 
         } else {
            $products = $this -> DB -> query('SELECT id_product, price_product FROM product WHERE id_product IN ('.implode(',',$ids).')'); // implode permet de récupérer les ids de manière dynamique et les séparer par une virgule.
         }
         foreach ($products as $product){
             $total += $product ['price_product'] * $_SESSION['basket'][$product['id_product']];
         }
         return $total;
    }

    // Création de la fonction qui va nous permettre d'ajouter un produit
    public function add_product($product_id) {
        if (isset($_SESSION['basket'][$product_id])){
            $_SESSION['basket'][$product_id]++;
        } else {
            $_SESSION['basket'][$product_id] = 1;
        }  
    }

    // Création de la fonction qui va nous permettre de supprimer un produit du panier
    public function del_product($product_id) {
        unset($_SESSION['basket'][$product_id]);
    }
}