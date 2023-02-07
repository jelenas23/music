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

<div class="row">
    <?php foreach ($pesme as $pesma) : ?>
        <div class="col s15 m7 l5 xl4">
            <div class="card z-depth-20 radius-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/ITunes_12.2_logo.png/600px-ITunes_12.2_logo.png" alt="icon" class="icon-card">
                <div class="card-content center">
                    <h5><b><?php echo htmlspecialchars($pesma['naziv']); ?></b></h5>
                    <h6><?php echo htmlspecialchars($pesma['izvodjac']); ?></h6>
                
                    <a href="detalji.php?id=<?php echo $pesma['id']; ?>" class="btn white-text red lighten-1">
                        Detaljnije
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('komponente/footer.php'); ?>

</html>