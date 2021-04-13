<?php include 'config/init.php';

// Récupération du submit ajout panier de la page produit
$json = array('error' => true);
if (isset($_GET['id'])) {

    //on place un drapeau pour éviter de mettre l'id directement dans l'url et tout risque d'injection SQL
    // On rajoute un second argument sous forme de tableau qui prend en clé id et la valeur $_GET['id']
    $product = $DB -> query('SELECT id_product FROM product WHERE id_product=:id', array('id' => $_GET['id'])); 
    

    if (empty($product)) {
        $json['message'] = 'Vous avez sélectionné un produit qui n\'existe pas.';
    }
    $basket -> add_product($product[0]['id_product']);
    $json['error'] = false;
    $json['message'] = 'Le produit a bien été ajouté à votre panier.';

} else {
    $json['message'] = 'Vous n\'avez pas sélectionner de produit à ajouter au panier';
}

echo json_encode($json);