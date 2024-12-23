<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
?>
<?php include("header.php") ?>
<?php
$err        = "";
if (isset($_POST['login'])) {
    $username   = $_POST["username"];
    $password   = $_POST["password"];
    $fetch      = new DataFetcher();
    $row        = $fetch->getAkun("akun", $username);

    //cek apakah username yang dimasukkan sudah terdaftar
    if (!empty($row)) {
        //cek apakah password yang dimasukkan benar
        if (password_verify($password, $row["password"])) {
            // berikan session jika username yang dimasukkan benar
            $_SESSION["login"] = true;

            //bawa user menuju halaman index.php
            header("Location: index.php");
            exit;
        } else {
            $err    = "Password yang dimasukkan salah";
        }
    } else {
        $err    = "Username tidak ditemukan";
    }
}
?>

<body style="width:100%; max-width:330px; margin:auto; padding:15px ">
    <form action="" method="post">
        <h1 style="text-align: center;">Silahkan Log in!</h1>

        <?php if ($err) : ?>
            <div class="alert alert-danger">
                <?php echo $err ?>
            </div>
        <?php endif; ?>

        <div class="from-group">
            <label for="username">Username :</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="from-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="from-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="from-group">
            <p>Silahkan <a href="signup.php">Daftar</a> jika belum memiliki akun</p>
        </div>
        <div style="display: flex; justify-content: center; align-items: center; ">
            <button class="btn btn-primary" type="submit" name="login">Masuk!</button>
        </div>
    </form>
<?php include("footer.php")?>