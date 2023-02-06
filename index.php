<?php

include('database/db.php');

$query = "SELECT * FROM pesma ORDER BY naziv ASC"; 
$result = mysqli_query($conn, $query); 
$pesme = mysqli_fetch_all($result, MYSQLI_ASSOC); 
mysqli_free_result($result); 

?>

<!DOCTYPE html>
<html lang="en">

<?php include('komponente/header.php'); ?>
<h1>jbj</h1>
<div class="row">
    <?php foreach ($pesme as $pesma) : ?>
        <div class="col s12 m6 l4 xl3">
            <div class="card z-depth-0 radius-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/ITunes_12.2_logo.png/600px-ITunes_12.2_logo.png" alt="icon" class="icon-card">
                <div class="card-content center">
                    <h5><?php echo htmlspecialchars($pesma['naziv']); ?></h5>
                    <h6>Izvodi<?php echo htmlspecialchars($pesma['izvodjac']); ?></h6>
                </div>
                <div class="card-action right-align radius-card">
                    <a href="show.php?id=<?php echo $pesma['id']; ?>" class="cyan-text text-darken-2">
                        Detaljnije
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('komponente/footer.php'); ?>

</html>