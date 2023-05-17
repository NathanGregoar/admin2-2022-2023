<html>
    <head>
        <title>Woodytoys b2b</title> 
    </head>
    <body>
        <h2>Ajouter un jouet !</h2>
        <form method="POST" action="?"> 
            <input type="search" placeholder="nom du jouet" name="nomDuProduit">
            <input type="search" placeholder="prix du jouet" name="prixDuProduit">
            <input type="search" placeholder="quantité du jouet" name="quantiteDuProduit">
            <button type="submit"> Ajouter le nouveau jouet ! </button>
        </form>

    <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Connect to the database
        $conn = mysqli_connect('157.230.24.247', 'root', 'user123', 'woodytoys');
        $sql = 'SELECT * FROM Products';

        if ($result = $conn->query($sql)){
            echo "<table><th>Nos Produits</th><th>Prix</th><th>Quantité</th>";
            while ($data = $result->fetch_assoc()) {
                echo "<tr><td>";
                echo $data['Product'];
                echo "</td><td>";
                echo $data['Price'];
                echo "</td><td>";
                echo $data['Quantity'];
                echo "</td><tr>";
            }
            echo "</table>";
        }

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomProduit = $_POST['nomDuProduit'];
            $prixDuProduit = $_POST['prixDuProduit'];
            $quantiteDuProduit = $_POST['quantiteDuProduit'];

            // Insert new toy into the database
            $insertSql = "INSERT INTO Products (Product, Quantity, Price) VALUES ('$nomProduit', $quantiteDuProduit, $prixDuProduit)";
            if ($conn->query($insertSql) === TRUE) {
                echo "<p>Jouet ajouté avec succès !</p>";
            } else {
                echo "Erreur lors de l'ajout du jouet : " . $conn->error;
            }
        }
    ?>

    </body>
</html>
