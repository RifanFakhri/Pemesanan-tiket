<?php 

$conn = mysqli_connect('localhost','root','','baturaden') or die("Koneksi ke database gagal!");

//mengambil data dari database lalu mengembalikan hasil dalam bentuk array asosiatif
function ambildata($conn,$query){ 
    $data = mysqli_query($conn,$query);
    if (mysqli_num_rows($data) > 0) {
        while($row = mysqli_fetch_assoc($data)){
        $hasil[] = $row;
    }

    return $hasil;
    }
}

function bisa($conn,$query){
    $db = mysqli_query($conn,$query);

    if($db){
        return 1;
    }else{
        return 0;
    }
}


//mengambil data 1 baris dan mengembalikan menjaadi array asosiatif
function ambilsatubaris($conn,$query){
    $db = mysqli_query($conn,$query);
    return mysqli_fetch_assoc($db);
}

function hapus($where,$table,$redirect){
    $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    echo $query;
}

?>