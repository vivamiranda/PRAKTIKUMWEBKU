<?php 
    //$nama = "mira";
    // echo "Hello World" . $nama;

   require 'function.php';
   $query = "SELECT * FROM mahasiswa";
   $rows = query($query); /// hasilnya wadah dengan isinya


    // cek koneksi
    // $koneksi = mysqli_connect("localhost:3307","root","","webif");

   // if(!$koneksi)
   // {
     //   die("Koneksi Gagal".mysqli_connect_error());
    //}
    //else
    //{
    //    echo "Koneksi Berhasil";
    // }

    //$query = "SELECT * FROM mahasiswa";

    //$result = mysqli_query($koneksi, $query); ////object

    // ambil data (fatch) dari lemari result
    // while($mhs = mysli_fetch_assoc($result))

    //mysqli_fetch_row() untuk array tipe numerik
    //mysqli_fetch_assoc() untuk assosiatif
    //mysqli_fetch_array()
    //mysqli_fetch_object () pakai_var_dump($mhs->nama);
    
    //{
     //   var_dump($mhs);
        /// kalo mau di tampilkan isi table tertentu var_dump($mhs["nim]);
    //}

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
    <a href = "tambahdata.php"><button style="margin-bottom: 12px; backround-color: ; ">Tambah Data</button> </a>
    <table border="1" callspacing="0" callpadding="10">
        <tr>
            <th>no </th>
            <th>foto </th>
            <th>nama </th>
            <th>nim </th>
            <th>jurusan </th>
            <th>nohp </th>
            <th>aksi </th>

        </tr>
        <?php 
        $i = 1;
        foreach ($rows as $mhs) {?>     
        <tr>
            <td><?= $i ?></td>
            <td><img src="images/<?=$mhs['foto'];?> "alt="<?=$mhs['nama'];?>"width="100"></td>
            <td><?=  $mhs ['nama'] ?></td>
            <td><?=  $mhs ['nim'] ?></td>
            <td><?=  $mhs ['jurusan'] ?></td>
            <td><?=  $mhs ['nohp'] ?></td>
            <td><a href = "hapusdata.php/?id=<?=$mhs["id"]?>"><button
            style="margin-bottom: 12px; background-color :lightpink ; " >Hapus</button> </a></td>

    
        </tr>
        <?php $i++; } ?>
</table>

</body>
</html>