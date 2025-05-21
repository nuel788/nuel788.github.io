<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idpg'];
    $password = md5($_POST['password']);

    //koneksi
    include 'koneksi.php';    

    // Masukkan data ke dalam database
    $query = "UPDATE tb_pengguna SET password='$password' WHERE id_pg=$id";

    if (mysqli_query($koneksi, $query)) {
        echo '<script language="javascript" type="text/javascript">
          alert("Data berhasil diupdate.");</script>';
        echo "<meta http-equiv='refresh' content='0; url=pengguna.php'>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>