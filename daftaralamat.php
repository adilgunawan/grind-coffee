<?php 
include 'templates/header.php';
?>

    <div class="sectionprofil">
      <div class="leftbarmenu">
        <div class="namaprofil">
          <i class="fa-regular fa-circle-user"><h5>Putri Mulyani</h5></i>
        </div>
        <div class="menuleftbar">
          <div class="menu">
            <i class="fa-regular fa-circle-user"><h5>Profil</h5></i>
          </div>
          <div class="menu">
            <i class="fa-solid fa-address-book"><h5>Daftar Alamat</h5></i>
          </div>
          <hr />
          <div class="menu">
            <i class="fa-solid fa-clipboard-list"><h5>Pesanan Saya</h5></i>
          </div>
        </div>
      </div>

      <div class="isiprofil">
        <div class="alamat">
          <i class="fa-solid fa-address-book"></i>
          <h5>Daftar Alamat</h5>
          <button><i class="fa-solid fa-plus"></i>Tambah Alamat Baru</button>
        </div>
        <hr class="garis" />
        <div class="daftaralamat">
          <label for="">Alamat</label>
          <div class="textalamat">
            <h5>Putri Mulyani | <span>085379464141</span></h5>
            <h3>
              Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota
              Batam, Kepulauan Riau 29461
            </h3>
            <div class="hapusbtn">
              <button>Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 
include 'templates/footer.php';
?>
