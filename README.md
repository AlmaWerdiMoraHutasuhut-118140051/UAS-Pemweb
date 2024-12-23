# Data Buku

Sistem ini akan menampilkan data - data buku yang tersimpan di dalam server. Sistem ini memiliki satu aktor yaitu _user_. Ketika user ingin masuk kedalam sistem, _user_ harus melakukan _log in_ menggunakan akun yang telah terdaftar. Apabila _user_ belum memiliki akun, _user_ harus membuat akun terlebih dahulu.

## _Sign Up_ dan _Log In_

Pada proses _Sign Up_, _user_ diminta untuk memberikan inputan ke dalam 6 buah form, yaitu form nama, jenis kelamin, email, _username_, _password_, dan _confirmation password_. Seluruh form ini bersifat wajib diisi, sehingga apabila ada form yang kosong, maka _user_ tidak dapat mendaftarkan akun yang baru. 
Pada proses _Log In_ terdapat 3 buah form yang harus diisi, yaitu _username_, dan _password_. Sistem akan melakukan pengecekan terhadap sistem apakah _username_ yang kita masukkan sudah terdaftar di dalam sistem. Jika _username_ tidak terdaftar maka sistem akan memberikan _alert_ yang menyatakan "Username tidak ditemukan". Jika _username_ sudah terdaftar maka sistem akan melakukan validasi terhadap email dan _password_ yang kita masukkan dengan email dan _password_ yang tercatat di dalam sistem. Jika email yang kita masukkan tidak sesuai dengan yang tercatat didalam sistem, maka sistem akan memberikan _alert_ yang menyatakan "Email yang dimasukkan salah", begitu juga dengan _password_ akan memberikan _alert_ yang menyatakan "Password yang dimasukkan salah" jika _password_ yang dimasukkan tidak sesuai dengan yang tercatat didalam sistem. Setelah melalui proses _log in_ maka _user_ akan dibawa menuju halaman utama yang menampilkan data - data buku yang tersimpan didalam sistem.

## Pengelolaan data Menggunakan POST dan GET

Untuk menampilkan data yang ada didalam server, sistem menggunakan variabel global GET. Dimana variabel ini akan mengirim atau mengambil data ke dalam sistem dan data tersebut dapat dilihat pada url. Sedangkan variabel POST biasanya digunakan untuk data yang bersifat sensitif, dimana data tersebut tidak akan terlihat pada url, sehingga pengelolaan data menggunakan POST digunakan pada saat proses validasi _log in_.

## Objek PHP berbasis OOP

Untuk membuat objek PHP kita membutuhkan sebuah kelas pada sistem ini, yaitu kelas DataFetcher. Kelas ini memiliki 3 buah function, yaitu fetchData, getAkun dan setAkun. Kelas ini merupakan turunan dari kelas Koneksi sehingga kelas DataFetcher dapat mengakses atribut maupun method _parent_-nya.

## State management

Session berfungsi untuk menyimpan berbagai data _user_. Biasanya session diberikan kepada _user_ ketika sebuah _user_ sudah melakukan _log in_. Session akan menyimpan data seperti _id user_ dan level hak akses _user_ selama sesi aktif. Data dalam session akan disimpan di dalam server. 

Cookie juga dapat digunakan untuk menyimpan data _user_, akan tetapi data cookie disimpan pada sisi browser sehingga data _user_ tidak tersimpan sebaik penyimpanan yang diterapkan session. 