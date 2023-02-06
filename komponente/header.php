<?php

include('database/session.php');

if (isset($_POST['logout'])) {
    session_unset();
    header('Location: login.php');
}

?>

<head>
    <title>iTunes Favorites</title>
    <linK rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/ITunes_12.2_logo.png/600px-ITunes_12.2_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .title-text {
            font-size: xx-large;
        }

        .nav-text {
            font-size: large;
            font-weight: 600;
        }

        .icon-card {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

        .radius-card {
            border-radius: 20px;
        }

        .form {
            padding: 10px;
            margin-left: 25%;
            width: 50%;
            text-align: center;
            border-radius: 15px;
        }
    </style>
</head>

<body class="cyan lighten-5">
    <nav class="cyan darken-2">
        <div class="container">
            <a href="index.php" class="title-text">iTunes Favorites</a>

            <?php if ($loggedId != 0) : ?>
                <ul class="right hide-on-small-and-down navul">
                    <li>
                        <a href="profil.php?id=<?php echo $loggedId ?>" class="btn white cyan-text nav-text z-depth-0">
                            Tvoji favoriti
                        </a>
                    </li>
                    <li>
                        <a href="dodaj.php" class="btn white cyan-text nav-text z-depth-0">
                            Dodaj svoje favorite
                        </a>
                    </li>
                    <li style="padding-left: 15px;">
                        <form action="" method="POST">
                            <input type="submit" name="logout" value="logout" class="btn white cyan-text nav-text z-depth-0">
                        </form>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="right hide-on-small-and-down navul">
                    <li>
                        <a href="registracija.php" class="btn white cyan-text nav-text z-depth-0">
                            Registracija
                        </a>
                    </li>
                    <li>
                        <a href="login.php" class="btn white cyan-text nav-text z-depth-0">
                            Prijava
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>