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
        <a href="index.php" class="btn center cyan darken-2">Return</a>
    </div>

<?php elseif ($pesme!= null) : ?>

    <div class="container">
        <h2 class="center">Tvoji iTunes favoriti</h2>
        <div class="row">
            <?php foreach ($pesme as $pesma) : ?>
                <div class="col s12 m6 l4 xl3">
                    <div class="card z-depth-0 radius-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/ITunes_12_logo.png" alt="icon" class="icon-card">
                        <div class="card-content center">
                            <h4><b>My Fav</b><h4>
                            <h5><?php echo htmlspecialchars($pesma['naziv']); ?></h5>
                            <h6><?php echo htmlspecialchars($pesma['izvodjac']); ?></h6>
                        </div>
                        <div class="card-action right-align radius-card">
                            <a href="detalji.php?id=<?php echo $pesma['id']; ?>" class="cyan-text text-darken-2">
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
        <a href="dodaj.php" class="btn center cyan darken-2">Dodaj</a>
    </div>

<?php endif; ?>

<?php include('komponente/footer.php'); ?>

</html>