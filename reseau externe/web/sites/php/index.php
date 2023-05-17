<html>
    <head>
        <title>Woodytoys b2b</title> 
    </head>
    <body>
        <h2>Ajouter un jouet !</h2>
        <form method="POST" action="?"> 
            <input type="search" placeholder="nom du jouet" name="nomDuProduit">
            <input type="search" placeholder="prix du jouet" name="prixDuProduit">
            <button type="submit"> Ajouter le nouveau jouet ! </button>
        </form>

    <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Connect to the database
        $conn = mysqli_connect('157.230.24.247', 'root', 'user123', 'woodytoys');
        $sql = 'SELECT * FROM Products';

        if ($result = $conn->query($sql)){
            while ($data = $result->fetch_assoc()) {
                $produits[] = $data;
            }
            echo "<table><th>Nos Produits</th>";
            foreach ($produits as $prod) {
                echo "<tr><td>";
                echo $prod['Product'];
                echo "</td><td>";
                echo $prod['Quantity'];
                echo "</td><tr>";
            }
            echo "</table>";
        }
    ?>

    </body>
</html>
