<?php

include('database/db.php');

session_unset();

$username = $password = '';
$errors = ['username' => '', 'password' => ''];

if (isset($_POST['login'])) {

    if (empty($_POST['username'])) {
        $errors['username'] = 'Unesite korisnicko ime!';
    } else {
        $username = $_POST['username'];

        
        $query = "SELECT * FROM korisnik WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        if ($user == null) {
            $errors['username'] = "Pogresno korisnickom ime!";
        } elseif (empty($_POST['password'])) {
            $errors['password'] = "Unesite sifru!";
        } else { 
            $password = $_POST['password'];

            
            if (strcmp($password, $user['password'])) {
                $errors['password'] = "Pogresna sifra!";
            } else {

                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                
                header('Location: index.php');
            }
        }
    }
}




?>

<!DOCTYPE html>
<html>

<?php include('komponente/header.php') ?>

<section class="container">
    <h4 class="center">Dobrodosli na iTunes Favorites</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="username">Korisnicko ime:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
        <div class="red-text"><?php echo $errors['username']; ?></div>

        <label for="password">Sifra:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
        <div class="red-text" style="padding-bottom:10px;"><?php echo $errors['password']; ?></div>

        <div class="center">
            <input type="submit" name="login" value="Login" class="btn cyan darken-2 z-depth-0">
        </div>
    </form>

</section>

<?php include('komponente/footer.php') ?>

</html>