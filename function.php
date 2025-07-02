<?php

// Cek koneksi
$koneksi = mysqli_connect("localhost:3307", "root", "", "webif");

if (!$koneksi) {
    die("Koneksi Gagal! " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}

// Fungsi ambil data
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi tambah data
function tambahdata($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $nohp = $data["nohp"];

    // Handle upload foto
    $namaFile = $_FILES['foto']['name'];
    $namafile = date('dmy_hm'). '_'. $file;
    $tmpFile = $_FILES['foto']['tmp_name'];
    $folder = 'images/';
    $targetPath = $folder . $namaFile; // Menggabungkan folder dengan file

    // Pindahkan file ke folder images/
    if (move_uploaded_file($tmpFile, $targetPath)) {

        // Simpan nama file ke DB
        $query = "INSERT INTO mahasiswa VALUES ('', '$namaFile', '$nama', '$nim', '$jurusan', '$nohp')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);

    } else {
        return 0; // gagal upload
    }
}

// ✅ Fungsi hapus data (yang sebelumnya hilang)
function hapusdata($id)
{
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahdata($data, $id)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $nohp = $data["nohp"];

    // Handle upload foto
    $file = $_FILES['foto']['name'];
    $namafile = date('dmy_hm') . '_' . $file;
    $tmpFile = $_FILES['foto']['tmp_name'];
    $folder = 'images/';
    $targetPath = $folder . $namafile;

    // Pindahkan file ke folder images/
    if (move_uploaded_file($tmpFile, $targetPath)) {
        $query = "UPDATE mahasiswa SET 
            foto = '$namafile',
            nama = '$nama',
            nim = '$nim',
            jurusan = '$jurusan',
            nohp = '$nohp'
            WHERE id = $id";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0; // gagal upload
    }
}

