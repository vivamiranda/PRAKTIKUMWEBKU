<?php //untuk menyambungkan ke database yangg sudah kita buat,sesuai local hostnya 3307
    $koneksi = mysqli_connect("localhost:3307","root","","webif");

    if(!$koneksi)
    {
        die("Koneksi Gagal".mysqli_connect_error());
    }
    else
    {
        echo "Koneksi Berhasil";
    }

    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query); //object

    // ambil data (fatch) dari lemari result

    $mfhs = mysqli_fetch_row($result);
    // mysqli_fetch_row()
    // mysqli_fetch_assoc()
    // mysqli_fetch_object()

    var_dump($mhs[1]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa </h1>

    <table border="1" callspacing="0" callpadding="10">
        <tr>
            <th>No </th>
            <th>Nama </th>
            <th>Nim </th>
            <th>Jurusan </th>
            <th>No HP </th>
        </tr>
</table>
</body>
</html>