<?php

include('database/db.php');

if (isset($_GET['id'])) {  
    $id = mysqli_real_escape_string($conn, $_GET['id']); 

   
    $query = "SELECT * FROM pesma WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $pesma = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $userid = $pesma['korisnik_id'];

    
    $query = "SELECT * FROM korisnik WHERE id = $userid";
    $result = mysqli_query($conn, $query);
    $creator = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);

    $query = "DELETE FROM pesma WHERE id = $id AND korisnik_id = $userid";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('komponente/header.php'); ?>

<?php if ($pesma == null) : ?>
    <h1 class="center">Nemamo informacije!</h1>
    <div class="center">
        <a href="index.php" class="btn center cyan darken-2">Nazad</a>
    </div>

<?php else : ?>
    <div class="container center">
        <div class="card z-depth-0 radius-card" style="padding-bottom: 30px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/ITunes_logo.svg/1019px-ITunes_logo.svg.png" alt="icon" class="icon-card">
            <h3><?php echo $pesma['naziv']; ?></h3>
            <h4>Izvodjac :<?php echo $pesma['izvodjac']; ?></h4>
            <h5>Zanr: <?php echo $pesma['zanr']; ?></h5>
            <h5>Trajanje: <?php echo $pesma['trajanje']; ?></h5>
            <h5>Godina: <?php echo $pesma['godina']; ?></h5>
            <h6>Dodato: <?php echo date($pesma['created_at']); ?></h6>

            <?php if ($userid == $loggedId) { ?>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding-top:20px">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                    <input type="submit" name="delete" value="Obrisi" class="btn center cyan darken-2">
                </form>

            <?php } else { ?>

                <h6>Dodao/la: <?php echo $creator['username']; ?></h6>

            <?php }; ?>


        </div>
    </div>

<?php endif; ?>

<?php include('komponente/footer.php'); ?>

</html>