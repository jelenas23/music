<?php

include('database/db.php');
include('model/Korisnik.php');


$email = $username = $password = '';


$errors = ['email' => '', 'username' => '', 'password' => ''];

if (isset($_POST['registration'])) {

    if (empty($_POST['email'])) {  
        $errors['email'] = 'Unesite email!'; 
    } else {
        $email = $_POST['email']; 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Neispravna email adresa!';
        }
    }

    if (empty($_POST['username'])) {
        $errors['username'] = 'Korisnicko ime je obavezno!';
    } else {
        $username = $_POST['username'];

        $query = "SELECT * FROM korisnik WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $userWithSameUsername = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        if ($userWithSameUsername != null) { 
            $errors['username'] = "Korisnik sa ovim korisnickim imenom vec postoji!";
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Sifra je obavezna!';
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 5) {   
            $errors['password'] = 'Vasa sifra mora imati najmanje 5 znakova!';
        }
    }

    if (!array_filter($errors)) {  
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $noviKorisnik = new Korisnik(null, $username, $password, $email);
        $noviKorisnik->dodajKorisnika();
        alert("Uspesna registracija!");
    }
}


?>

<!DOCTYPE html>
<html>

<?php include('komponente/header.php') ?>

<section class="container">
    <h4 class="center">Registrujte se na iTunes Favourites i podelite sa nama svoje favorite</h4>

   
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label for="username">Korisnicko ime:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <div class="red-text"><?php echo $errors['username']; ?></div>

        <label for="password">Šifra:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <div class="center">
            <input type="submit" name="registration" value="Kreiraj nalog" class="btn cyan darken-2 z-depth-0">
        </div>
    </form>
</section>

<?php include('komponente/footer.php') ?>

</html>