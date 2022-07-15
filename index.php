<?php

   include 'koneksi.php';
   session_start();

    
    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;0,800;1,600&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.js"></script>
    <script src="datatables/datatables.js"></script>

    <title>crudwoi</title>
</head>



<body class="bg">
    
    <nav class="navbar fixed-top ms-auto ">
    <div class="container">
    <div class="navbar-brand cianjingeun" href="index.php">
        <img src="img/user.png" alt="" width="37" height="40" class="">
        SMPN 123
        </div>
        <div class="geserkanan">
            <a href="#">
                <img class="dtnav" src="img/man.png" alt="" width="27" height="30" >
                <a href="index.php" class="tulisan">Data Siswa</a>
            </a>
        </div>
        <div class="geserkanan">
            <a href="#">
                <img class="dtnav" src="img/people.png" alt="" width="27" height="30" >
                <a href="dataguru.php" class="tulisan">Data Guru</a>
            </a>
        </div>
        <div class="">
            
        <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-in">  logout</i></a>
        </div>

                 
    </nav>
    <div class="judul">
    <h1 class="mt-3 text-center" ><b>DATA SISWA</b></h1>
        <figure class="text-center"> 
                <p><b> SMPN 123 </b></p>
            <figcaption class="blockquote-footer crud">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>

    </div>
    
    <div class="container mb-5 ">
        <a href="kelola.php" type="button" class="btn btn-primary mb-3 mt-3"><i class="fa fa-plus">  Tambah Data</i></a>
        <?php
            if(isset($_SESSION['eksekusi'])):
        ?>
            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                    <?php
                        echo $_SESSION['eksekusi'];
                    ?>              
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            session_destroy();
            endif;
        ?>
        
        <div class="table-responsive mb-5">
            <table id="dt" class="table align-middle table-hover  table-striped primary ">
                <thead class="atastabel">
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th >NIM</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><center>
                            <?php echo ++$no;?>.
                            </center>
                        </td>
                        <td><?php echo $result['nim'];?></td>
                        <td><?php echo $result['nama_mahasiswa'];?></td>
                        <td><?php echo $result['jenis_kelamin'];?></td>
                        <td>
                            <img src="img/<?php echo $result['foto_siswa'];?>" style="width: 100px; height:100px;">
                        </td>
                        <td><?php echo $result['alamat'];?></td>
                        <td>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('yakin dihapus???')"> 
                            <i class="fa fa-trash"></i></a>

                            <a href="kelola.php?ubah=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php 
                    }      
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dt').DataTable();
    });
</script>

</html>