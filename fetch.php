<?php
include("koneksi.php");
class DataFetcher extends Koneksi
{
    public function fetchData($table, $id = 0)
    {
        $sql = "SELECT * FROM $table";
        if ($id > 0) {
            $sql .= "WHERE id = $id";
        }
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch all rows as an associative array
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }

    public function getAkun($table, $username)
    {
        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result) {
            // Fetch all rows as an associative array
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function setAkun($data)
    {
        if (!empty($data)) {

            $nama       = htmlspecialchars($data["name"]);
            $gender     = htmlspecialchars($data["gender"]);
            $email      = htmlspecialchars($data["email"]);
            $username   = strtolower(stripslashes($data["username"]));
            $password   = mysqli_real_escape_string($this->conn, $data["password"]);
            $password2  = mysqli_real_escape_string($this->conn, $data["password2"]);

            if (!$this->getAkun('akun', $username)) {
                // Validasi Username
                if (empty($username)) {
?>
                    <div class="alert alert-danger">
                        <?php echo "Username harus diisi" ?>
                    </div>
                <?php
                    return false;
                } elseif (!preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $username)) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Username tidak boleh diawali dengan simbol atau angka" ?>
                    </div>
                <?php
                    return false;
                }

                // Validasi Email
                if (empty($email)) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Email harus diisi" ?>
                    </div>
                <?php
                    return false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Email anda tidak valid" ?>
                    </div>
                <?php
                    return false;
                }

                // Validasi Password
                if (empty($password)) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Password harus diisi" ?>
                    </div>
                <?php
                    return false;
                } elseif (!preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', $password)) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Password minimal 8 karakter dan berisi minimal 1 buah angka dan 1 buah simbol" ?>
                    </div>
                <?php
                    return false;
                }

                if ($password2 !== $password) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo "Password anda belum sinkron" ?>
                    </div>
                <?php
                    return false;
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO akun VALUES ('','$nama','$gender','$email','$username','$password')";
                    $result = $this->conn->query($sql);

                    return ($result);
                }
            } else {
                ?>
                <div class="alert alert-danger">
                    <?php echo "Username yang anda masukkan sudah terdaftar" ?>
                </div>
<?php
                return false;
            }
        }
    }
}
