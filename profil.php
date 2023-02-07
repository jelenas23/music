<?php

include('database/db.php');

if (isset($_GET['id'])) {
    $userid = mysqli_real_escape_string($conn, $_GET['id']);
}


$query = "SELECT * FROM pesma WHERE korisnik_id='$userid'"; 
$result = mysqli_query($conn, $query);
$pesme = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('komponente/header.php'); ?>

<?php if ($userid != $loggedId) : ?>

    <h1 class="center">Nemate dozvolu za pregled profila ovog korisnika, bicete preusmereni na pocetnu stranu!</h1>
    <div class="center">
        <a href="index.php" class="btn center red darken-2">Return</a>
    </div>

<?php elseif ($pesme!= null) : ?>

    <div class="container">
        <h2 class="center blue-text"><b>Tvoji iTunes favoriti<b></h2>
        <div class="row">
            <?php foreach ($pesme as $pesma) : ?>
                <div class="col s12 m6 l4 xl3">
                    <div class="card z-depth-40 radius-card">
                        <img src="https://cutewallpaper.org/cdn-cgi/mirage/2af0adefb1b7ebf6af3b94bf8b86378693ec8b55d34af727ac0cbb58dfd044f5/1280/24/itunes-logo-png/itunes-logo-png-transparent-designbust.png" alt="icon" class="icon-card">
                        <div class="card-content center">
                            <h4><b>My Fav</b><h4>
                            <h5><?php echo htmlspecialchars($pesma['naziv']); ?></h5>
                            <h6><?php echo htmlspecialchars($pesma['izvodjac']); ?></h6>
                            
                            <a href="detalji.php?id=<?php echo $pesma['id']; ?>" class="btn white-text red lighten-1">
                                Detaljnije
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php else : ?>

    <h1 class="center">Nisi dodao/la svoje favorite, iskoristi priliku i podeli ih sa ostalima!</h1>
    <div class="center">
        <a href="dodaj.php" class="btn center red ligtehn-1">Dodaj</a>
    </div>

<?php endif; ?>

<?php include('komponente/footer.php'); ?>

</html>