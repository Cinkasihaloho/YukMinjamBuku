<?php
function harga($TipeBuku){
if ($TipeBuku=="Baru") {
  return 5000;
}
else {
  return 3000;
}
}


Class Peminjam { //membuat kelas

    private $Nama;
    private $Nim;
    private $Jurusan;
    
    //membuat setter
    function setNama($Nama) {
        $this->Nama = $Nama;
    }
    function setNim($Nim){
        $this->Nim = $Nim;
    }
    function setJurusan($Jurusan){
        $this->Jurusan = $Jurusan;
    }
    
    //membuat getter
    function getNama() {
        return $this->Nama;
    }
    function getNim() {
        return $this->Nim;
    }
    function getJurusan() {
        return $this->Jurusan;
    }
    
} // akhir kelas

Class Buku { //membuat kelas

    private $Judul;
    private $TipeBuku;
    
    //membuat setter
    function setJudul($Judul) {
        $this->Judul = $Judul;
    }
    function setTipeBuku($TipeBuku){
        $this->TipeBuku = $TipeBuku;
    }
    
    //membuat getter
    function getJudul() {
        return $this->Judul;
    }
    function getTipeBuku() {
        return $this->TipeBuku;
    }
}

  $peminjam = new Peminjam();
if (!empty($_POST['nama']) && !empty($_POST['nim']) && !empty($_POST['jurusan'])) {
  $nama= $_POST['nama'];
  $nim= $_POST['nim'];
  $jurusan= $_POST['jurusan'];

  $peminjam -> setNama($nama);
  $peminjam -> setNim($nim);
  $peminjam -> setJurusan($jurusan);
}

  $buku = new Buku();
if (!empty($_POST['Judul']) && !empty($_POST['TipeBuku'])) {
  $Judul= $_POST['Judul'];
  $TipeBuku= $_POST['TipeBuku'];
  $harga= harga($TipeBuku);

  $buku -> setJudul($Judul);
  $buku -> setTipeBuku($TipeBuku);
}        

?>

<!DOCTYPE html>
<html>
<head>
	<title>Buku yang Dipinjam</title> 
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
</head>
<body>
	 <div class="row">
    <div class="col s12 m6">
      <form class="col s12" action="buku.php" method="post">
        <div class="card white">
          <div class="card-content">
            <span>Yuk Minjam Buku!</span>
            <div class="row">
               <div class="row">
                <div class="input-field col s12">
                  <input name="nama" id="Nama" type="text" class="validate">
                  <label for="Nama">Nama</label>
                </div>
                  <div class="input-field col s12">
                        <input name="nim"  id="Nim" type="text" class="validate">
                        <label for="Nim">Nim</label>
                      </div>
                  <div class="input-field col s12">
                        <input name="jurusan" id="Jurusan" type="text" class="validate">
                        <label for="Jurusan">Jurusan</label>
                      </div>
              </div>
      

              <div class="row">
                <div class="input-field col s12">
                  <input name="Judul" id="Judul" type="text" class="validate">
                  <label for="Judul">Judul</label>
                </div>
                <div class="input-field col s12 white-text">
                  <select name="TipeBuku">
                    <option value="" disabled selected>Tipe Buku</option>
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
                  </select>
                  <label>Tipe Buku</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card-action">
            <button type="submit" class="waves-effect waves-light btn">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col s12 m6">
      <div class="card orange darken-1">
        <div class="card-content white-text">
            <span class="card-title">
              Detail Peminjaman
            </span>
            <p>Nama : <?php if(!empty($peminjam->getNama())) echo $peminjam->getNama(); ?></p>
            <p>Nim : <?php if(!empty($peminjam->getNim())) echo $peminjam->getNim(); ?></p>
            <p>Jurusan : <?php if(!empty($peminjam->getJurusan())) echo $peminjam->getJurusan(); ?></p>
            <p>Judul : <?php if(!empty($buku->getJudul())) echo $buku->getJudul(); ?></p>
            <p>Tipe Buku : <?php if(!empty($buku->getTipeBuku())) echo $buku->getTipeBuku(); ?></p>
            <p>Harga : <?php if(!empty($harga)) echo $harga; ?></p>
        </div>
    
      </div>
    </div>
  </div>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  M.AutoInit();
</script>

</body>
</html>