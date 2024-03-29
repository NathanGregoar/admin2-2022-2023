<!DOCTYPE html>
<html>
<head>
    <title>Woodytoys B2B</title>
    <link rel="icon" href="https://static.vecteezy.com/ti/photos-gratuite/p2/963590-gros-plan-d-un-jouet-en-bois-avion-modele-sculpte-a-la-main-photo.jpg" type="image/jpeg">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            margin-top: 0;
            color: #333;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        input[type="search"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #333;
            color: #fff;
        }
        
        p.success {
            color: green;
        }
        
        p.error {
            color: red;
        }
        
        /* Styles specific to match the WoodyToys branding */
        body {
            background-color: #fff;
            color: #333;
        }
        
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        form {
            margin-bottom: 30px;
        }
        
        input[type="search"] {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #333;
            border-radius: 4px;
        }
        
        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #333;
            color: #fff;
        }
        
        p.success {
            color: green;
        }
        
        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Ajouter un jouet !</h2>
    <form method="POST" action="?">
        <input type="search" placeholder="Nom du jouet" name="nomDuProduit">
        <input type="search" placeholder="Prix du jouet" name="prixDuProduit">
        <input type="search" placeholder="Quantité du jouet" name="quantiteDuProduit">
        <button type="submit">Ajouter le nouveau jouet !</button>
    </form>

    <h2>Supprimer un jouet !</h2>
    <form method="POST" action="?">
        <input type="search" placeholder="Nom du jouet à supprimer" name="nomDuProduitASupprimer">
        <button type="submit">Supprimer le jouet</button>
    </form>

    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Connect to the database
    $conn = mysqli_connect('157.230.24.247', 'root', 'user123', 'woodytoys');
    $sql = 'SELECT * FROM Products';

    if ($result = $conn->query($sql)) {
        echo "<table><tr><th>Nos Produits</th><th>Prix</th><th>Quantité</th></tr>";
        while ($data = $result->fetch_assoc()) {
            echo "<tr><td>";
            echo $data['Product'];
            echo "</td><td>";
            echo $data['Price'];
            echo "</td><td>";
            echo $data['Quantity'];
            echo "</td></tr>";
        }
        echo "</table>";
    }

    // Handle form submission for adding a toy
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomDuProduit']) && isset($_POST['prixDuProduit']) && isset($_POST['quantiteDuProduit'])) {
        $nomProduit = $_POST['nomDuProduit'];
        $prixDuProduit = $_POST['prixDuProduit'];
        $quantiteDuProduit = $_POST['quantiteDuProduit'];

        // Check if the toy already exists
        $checkSql = "SELECT * FROM Products WHERE Product='$nomProduit'";
        $checkResult = $conn->query($checkSql);
        if ($checkResult->num_rows > 0) {
            echo "<p class='error'>Ce jouet existe déjà !</p>";
        } else {
            // Insert new toy into the database
            $insertSql = "INSERT INTO Products (Product, Quantity, Price) VALUES ('$nomProduit', $quantiteDuProduit, $prixDuProduit)";
            if ($conn->query($insertSql) === TRUE) {
                echo "<p class='success'>Jouet ajouté avec succès !</p>";
                // Refresh the page to update the product list
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "<p class='error'>Erreur lors de l'ajout du jouet : " . $conn->error . "</p>";
            }
        }
    }

    // Handle form submission for deleting a toy
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomDuProduitASupprimer'])) {
        $nomProduitASupprimer = $_POST['nomDuProduitASupprimer'];

        // Delete toy from the database
        $deleteSql = "DELETE FROM Products WHERE Product='$nomProduitASupprimer'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<p class='success'>Jouet supprimé avec succès !</p>";
            // Refresh the page to update the product list
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "<p class='error'>Erreur lors de la suppression du jouet : " . $conn->error . "</p>";
        }
    }
    ?>

</body>
</html>