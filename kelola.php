<!DOCTYPE html>
<?php 
    include 'koneksi.php';
    session_start();

    

        $id_siswa ='';
        $nim = '';
        $nama_mahasiswa  = '';
        $jenis_kelamin = '';
        $alamat = '';

     if(isset($_GET['ubah'])){
        $id_siswa = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa' ";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nim = $result['nim'];
        $nama_mahasiswa  = $result['nama_mahasiswa'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];
        
        //var_dump($result);

        //die();
     }
?>
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
    <a class="navbar-brand cianjingeun" href="#">
        <img src="img/user.png" alt="" width="37" height="40" class="">
        SMPN 123
        </a>
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
    <h1 class="mt-3 text-center"  ><b></b></h1>
        <figure class="text-center"> 
                <p><b></b></p>
            <figcaption class="blockquote-footer crud">
                 <cite title="Source Title"></cite>
            </figcaption>
        </figure>

    </div>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa?>" name="id_siswa">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input required type="text" name="nim" class="form-control" id="nim" placeholder="Ex: 123456" value="<?php echo $nim ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input required type="text" name="nama_mahasiswa" class="form-control" id="nama" placeholder="Ex: haikal" value="<?php echo $nama_mahasiswa; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select  required id="jkel" name="jenis_kelamin" class="form-select">
                    <option <?php if($jenis_kelamin == 'laki-laki'){ echo "selected";} ?> value="laki-laki">laki-laki</option>
                    <option <?php if($jenis_kelamin == 'perempuan'){ echo "selected";} ?> value="perempuan">perempuan</option>
                    
                </select>
            </div>

        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto" id="Foto" accept="image/*" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
            <div class="col-sm-10">
                <textarea required class="form-control" id="alamat" name="alamat" rows="3" ><?php echo $alamat; ?></textarea></textarea>
            </div>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col">
                <?php 
                    if(isset($_GET['ubah'])){
                ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary "><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan </button>
                <?php
                    } else {
                ?>      
                    <button type="submit" name="aksi" value="add" class="btn btn-primary "><i class="fa fa-floppy-o" aria-hidden="true"></i> Tambahkan</button>
                    <?php
                    } 
                ?>     
                <a href="index.php" type="button" class="btn btn-danger "><i class="fa fa-reply" aria-hidden="true"></i>
                    Batal</a>
            </div>

        </div>
        </form>

    </div>


    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>