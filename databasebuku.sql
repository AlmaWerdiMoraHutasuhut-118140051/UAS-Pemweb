CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis kelamin` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `akun` (`id`, `nama`, `jenis kelamin`, `email`, `username`, `password`) VALUES
(1, 'werdi', 'Laki - laki', 'werdi@gmail.com', 'werdi', '$2y$10$eT8XRfFphLwC0ZBXVnd32.vfz7eJK81BkqVUInrGHp.csMVJFhb7i'),
(2, 'alma', 'Laki - laki', 'alma@gmail.com', 'alma', '$2y$10$1Z4rZ3409VDxy9onx0/NZ.ZVxBXCkL6zzRjVAqEcMeVg9wWQXZe5.'),
(3, 'khadwan', 'Laki - laki', 'khadwan@gmail.com', 'khadwan', '$2y$10$5.DaF/yZXx0k.dmbXHxYVeEZOlexlLFKRt7fzR62jjOF0TWG/Vs6i'),
(4, 'rizka', 'Perempuan', 'rizka@gmail.com', 'rizka', '$2y$10$vG2VPiT908P98te7xBwj/uXwVNfh8WRkR7S1XFv6WC0ZiliDm7Iau');


CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `penulis` text NOT NULL,
  `kategori` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `penerbit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `buku` (`id`, `judul`, `penulis`, `kategori`, `tahun`, `penerbit`) VALUES
(1, 'Bandit Bandit Berkelas', 'Tere Liye', 'Novel', 2024, 'Sabak Grip'),
(2, 'Tanah Para Bandit', 'Tere Liye', 'Novel', 2023, 'Sabak Grip'),
(3, 'Bedebah di Ujung Tanduk', 'Tere Liye', 'Novel', 2021, 'Sabak Grip'),
(4, 'Pulang - Pergi', 'Tere Liye', 'Novel', 2020, 'Sabak Grip'),
(5, 'Pergi', 'Tere Liye', 'Novel', 2018, 'Republika'),
(6, 'Pulang', 'Tere Liye', 'Novel', 2015, 'Republika');

ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
