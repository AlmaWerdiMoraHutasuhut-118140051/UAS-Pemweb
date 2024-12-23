<?php include("header.php") ?>

<?php
if (isset($_POST['register'])) {

    $daftar = new DataFetcher();
    $result = $daftar->setAkun($_POST);
    if ($result) {
?>
        <div class="alert alert-success">
            <?php echo "Akunmu berhasil didaftarkan" ?>
        </div>
<?php
    }
}
?>

<body style="width:100%; max-width:330px; margin:auto; padding:15px ">
    <form action="" method="post">
        <h1 style="text-align: center;">Buat Akunmu disini!</h1>
        <div class="from-group">
            <label for="name">Nama :</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="from-group">
            <label for="gender">Jenis Kelamin :</label>
            <br>
            <select class="form-select" id="inputGroupSelect03" id="gender" name="gender" required>
                <option selected disabled>-</option>
                <option value="Laki - laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="from-group">
            <label for="username">Username :</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="from-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="from-group">
            <label for="password2">Re-enter Password :</label>
            <input type="password" class="form-control" name="password2" id="password2" required>
        </div>
        <div class="from-group">
            <p>Jika anda sudah memiliki akun, silahkan <a href="login.php">Log in </a> menggunakan akun anda</p>
        </div>
        <div style="display: flex; justify-content: center; align-items: center; ">
            <button class="btn btn-primary" type="submit" name="register">Daftar!</button>
        </div>
    </form>
    <?php include("footer.php") ?>