<section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">


            <div class="tabel1" style="background-color: brown;">
            <h4 class="section-heading mb-4">

              <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Pilihan</th>
                </tr>
                </thead>

                <?php 
                  $no = 1;
                  foreach($menu as $u){ 
                  ?>

                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u['nama']; ?></td>
                    <td><?php echo $u['harga']; ?></td>
                    <td><a class="btn btn-primary" href="<?= base_url(); ?>home/menu/<?= $u['id_menu']; ?>">Pesan</a></td>
                  </tr>

                <?php } ?>

              </table>
              </h4>
              </div>


            <tr>
               <td><h2><a href="<?= base_url('home/pesanan'); ?>">Daftar Pesanan</a></h2></td>             
            </tr>
          

        </div>
      </div>
    </div>
  </section>
