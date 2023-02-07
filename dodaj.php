<?php

include('database/db.php');
include('model/Pesma.php');
include('database/session.php');


$naziv = $izvodjac = $zanr = $trajanje = $godina = '';

$errors = [
    'naziv' => '', 'izvodjac' => '', 'zanr' => '',
    'trajanje' => '', 'godina' => ''
];

if (isset($_GET['id'])) {
    $userid = mysqli_real_escape_string($conn, $_GET['id']);
}

if (isset($_POST['add'])) {

    if (empty($_POST['naziv'])) {
        $errors['naziv'] = 'Naziv je obavezan!';
    } else {
        $naziv = $_POST['naziv'];
    }

    if (empty($_POST['izvodjac'])) {
        $errors['izvodjac'] = 'Izvodjac je obavezan!';
    } else {
        $director = $_POST['izvodjac'];
    }

    if (empty($_POST['zanr'])) {
        $errors['zanr'] = 'Zanr je obavezan!';
    } else {
        $leading_actor = $_POST['zanr'];
    }

    if (empty($_POST['godina'])) {
        $errors['godina'] = 'Godina je obavezna!';
    } else {
        $godina_string = $_POST['godina'];
        if (strlen($godina_string) != 4 || intval($godina_string) == 1) {
            $errors['godina'] = 'Godina mora imati 4 cifre!';
        } else {
            $godina = intval($godina_string);
            if ($godina > date("Y")) {
                $errors['godina'] = 'Morate uneti trenutnu godinu ili neku od prethodnih!';
            }
        }
    }

    if (empty($_POST['trajanje'])) {
        $errors['trajanje'] = 'Trajanje je obavezno!';
    } else {
        $trajanje= $_POST['trajanje'];
    }

    if (!array_filter($errors)) {
        $naziv = $_POST['naziv'];
        $izvodjac = $_POST['izvodjac'];
        $zanr = $_POST['zanr'];
        $trajanje = $_POST['trajanje'];
        $godina = $_POST['godina'];

        $novaPesma = new Pesma(
            null,
            $naziv,
            $izvodjac,
            $zanr,
            $trajanje,
            $godina,
            $loggedId,
            null
        );

        $novaPesma->dodajPesmu();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include('komponente/header.php'); ?>

<section class="container">
    <h4 class="center">Dodaj svoj novi muzicki favorit</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="naziv">Naziv pesme:</label>
        <input type="text" name="naziv" value="<?php echo htmlspecialchars($naziv) ?>">
        <div class="red-text"><?php echo $errors['naziv']; ?></div>

        <label for="izvodjac">Izvodjac:</label>
        <input type="text" name="izvodjac" value="<?php echo htmlspecialchars($izvodjac) ?>" >
        <div class="red-text"><?php echo $errors['izvodjac']; ?></div>

        <label for="zanr">Zanr:</label>
        <input type="text" name="zanr" value="<?php echo htmlspecialchars($zanr) ?>">
        <div class="red-text"><?php echo $errors['zanr']; ?></div>

        <label for="trajanje">Trajanje:</label>
        <input type="text" name="trajanje" value="<?php echo htmlspecialchars($trajanje) ?>">
        <div class="red-text"><?php echo $errors['trajanje']; ?></div>

        <label for="godina">Godina:</label>
        <input type="text" name="godina" value="<?php echo htmlspecialchars($godina) ?>">
        <div class="red-text"><?php echo $errors['godina']; ?></div>

        <input type="hidden" name="userid" value="<?php echo $loggedId; ?>">

        <div class="center">
            <input type="submit" name="add" value="Dodaj" class="btn red darken-2 z-depth-0">
        </div>
    </form>


</section>

<?php include('komponente/footer.php'); ?>


</html>