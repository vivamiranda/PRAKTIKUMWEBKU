<?php 

    require 'function.php';

    if(isset($_POST["submit"]))

    {
        if(tambahdata($_POST)> 0)
        {
            echo"
            <script>
                alert('Berhasil!'};
                document.location.href = 'datamahasiswa.php';
            </script>
            ";
            
        }
        else 
        {
            echo"
            <script>
                alert('Gagal!'};
                document.location.href = 'datamahasiswa.php';
            </script>
            ";
            mysqli_error($koneksi);
        }
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa </h1>
    <form action ="" method="post">
        <label for= "nama" > nama:  </label>
        <input type="text" name="nama" : id="name" placeholder ="nama lengakap*" required/><br>
        <label for= "nama" > nim:  </label>
        <input type="text" name="nim" : id="nim" required /><br>
        <label for= "jurusan" > jurusan:  </label>
        <input type="text" name="jurusan" : id="jurusan"required /><br>
        <label for= "nohp" > nohp:  </label>
        <input type="text" name="nohp" : id="nohp" /><br>
        <button type="submit" name="submit">Submit</button>


</form>





    
</body>
</html>