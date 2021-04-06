<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="language" content="NL">
    <meta name="viewport" content="width=divice-width, initial scale=1">
    <meta name="description" content="evenemnetenpagina">
    <meta name="author" content="Tyler van de steenoven">
    <meta name="keywords" content="artiesten/plaats/">
    <link href="CSS/evenementen.css" rel="stylesheet" type="text/css">
    <title>hyper-monkey / evenementen pagina</title>
<head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "energy";
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT  evenementen.max_bezoekers, DATE_FORMAT(evenementen.datum, '%d-%m-%Y') AS datum,
locaties.plaatsnaam, locaties.postcode AS plaats,  artiesten.naam AS artiest, artiesten.telefoon
FROM evenementen
INNER JOIN artiesten ON artiesten.artiest_id = evenementen.artiest_id
INNER JOIN locaties ON evenementen.locatie_id = locaties.locatie_id
WHERE evenementen.datum > NOW()
ORDER BY evenementen.datum ASC";

?>
    <header>

    
        <article id="monk-logo">
            <a href="#"><img src="IMG/logo.png" alt="logo hyper monkey"></a>
        </article>
        <article id="knoppen">
            <nav>
                <ul>
                    <li><a href="../Product pagina - Siwani/Product.php">Producten</a></li>
                    <li><a href="../evenementen pagina - Tyler/evenementten.html">Evenementen</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
        </article>
    </header>

    <main>
        <section class="banner">
            <img src="IMG/Bootcamp.jpg">
            <img id="band" src="IMG/Band-optreden.jpg">
        </section>

        <?php
    if($result = $conn->query($sql)){
        while($row = $result->fetch_assoc()){
?>
            <details class="evenement">
                <summary>
                    <div class='evenementen-artiest-locatie'>
                        <p class='artiest-naam'><?php echo "Artiest: ".$row['artiest']; ?></p>
                        <p class='locatie-datum'><?php echo "Datum: ".$row['datum']?></p>
                        <p class='artiest.bezoekers'><?php echo $row['max_bezoekers']. " ". "bezoekers"?></p>
                    </div>
                </summary>
                <section class='evenement-details'>
                    <div class='evenement-informatie'>
                    <p class="artiesten-telefoon"><?php echo $row['telefoon']?></p>
                        <img class='locatie-gebouw-foto' src='Images/shiba-inu.jpg' height="200">
                    </div>
                    <div class='evenement-kaart'>
                        <p class="locatie-plaats"><?php echo $row['plaatsnaam']. " ". $row['plaats']?></p>
                        <img src='Images/stok.jpg' height="200">
                    </div>
                </section>
            </details>

    <?php
        } 
    } 
    $result->close();
    ?>




        <!--COMMENT
        <details class="evenement">
            <summary>
                <div class="evenementen-artiest-locatie">
                    <section>
                        <p class="artiest-naam">Elvis Presley</p>
                        <p class="locatie-datum">datum: 20-06-2021</p>
                    </section>
                    <section>
                        
                        <p class="locatie-max-bezoekers">maximale bezoekers: 1000</p>
                    </section>
                </div>
            </summary>
            <section class="evenement-details">
                <div class="evenement-informatie">
                    <p class="locatie-plaats-postcode">locatie:noordwijk 6969gr </p>
                    <p class="telefoon-nummer"
                    <img class="locatie-gebouw-foto" src="IMG/Band-optreden.jpg">
                </div>
                <div class="evenement-kaart">
                    <img src="IMG/nederzandt.png">
                </div>
            </section>
        </details>
        -->




</main>

<footer>
    <article>
        <p><a href="#">Agenda</a></p>
    </article>
    <article>
    <a href="https://www.facebook.com/" target="_blank"><img src="IMG/facebook.png"></a>
    <a href="https://www.instagram.com/" target="_blank"><img src="IMG/instagram.png"></a>
    <a href="https://twitter.com/?lang=nl " target="_blank"><img src="IMG/twitter.png"></a>
</article>
<article>
    <p><a href="https://www.fit.nl/voeding/energiedrank-ongezond" target="_blank">Informatie</a></p>
</article>
</footer>











</body>