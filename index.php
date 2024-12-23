<?php
include("header.php");
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// Mengambil data buku
$databuku = new DataFetcher();

// Melakukan fetching data
$allData = $databuku->fetchData("buku");
?>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <h1>Data Buku</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Penerbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($allData)) {
                $i = 1;
                foreach ($allData as $row) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row["judul"] ?></td>
                        <td><?php echo $row["penulis"] ?></td>
                        <td><?php echo $row["kategori"] ?></td>
                        <td><?php echo $row["tahun"] ?></td>
                        <td><?php echo $row["penerbit"] ?></td>
                    </tr>
                <?php
                    $i += 1;
                }
            } else {
                ?>
                <div class="alert alert-danger">
                    <?php echo "Data tidak ditemukan" ?>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h1>Kelola Cookie</h1>
    <form id="dataForm">
        <div class="mb-3 row">
            <label for="inputData" class="col-sm-2 col-form-label">Masukkan Data:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputData" name="inputData" required>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="button" id="set" class="btn btn-outline-primary" name="set_cookie">Set Cookie</button>
                <button type="button" id="get" class="btn btn-outline-success" name="get_cookie">Get Cookie</button>
                <button type="button" id="save" class="btn btn-primary" name="save_cookie">Save Cookie</button>
                <button type="button" id="delete" class="btn btn-danger" name="delete_cookie">Delete Cookie</button>
            </div>
        </div>
    </form>
    <div id="displayData" style="margin-top: 20px; color: blue;"></div>

    <script>
        // Mendapatkan elemen-elemen dari HTML
        const inputData = document.getElementById('inputData');
        const displayData = document.getElementById('displayData');

        // Event listener untuk tombol Set
        document.getElementById('set').addEventListener('click', function() {
            const data = inputData.value;
            if (data) {
                localStorage.setItem('dataKey', data);
                displayData.textContent = `Data diset ke: ${data}`;
            } else {
                alert('Tolong masukkan data terlebih dahulu!');
            }
        });

        // Event listener untuk tombol Get
        document.getElementById('get').addEventListener('click', function() {
            const savedData = localStorage.getItem('dataKey');
            if (savedData) {
                displayData.textContent = `Data yang tersimpan: ${savedData}`;
            } else {
                displayData.textContent = 'Tidak ada data yang tersimpan.';
            }
        });

        // Event listener untuk tombol Save
        document.getElementById('save').addEventListener('click', function() {
            const data = inputData.value;
            if (data) {
                localStorage.setItem('dataKey', data);
                displayData.textContent = `Data disimpan: ${data}`;
            } else {
                alert('Tolong masukkan data terlebih dahulu!');
            }
        });

        // Event listener untuk tombol Delete
        document.getElementById('delete').addEventListener('click', function() {
            localStorage.removeItem('dataKey');
            displayData.textContent = 'Data telah dihapus.';
            inputData.value = ''; // Kosongkan input
        });
    </script>
    <?php include("footer.php") ?>