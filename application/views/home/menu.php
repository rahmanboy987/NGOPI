<section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h4 class="section-heading mb-4">
            <table class="table">
            <div class="table-responsive">
              <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Pilihan</th>
                </tr>
                <?php 
                  $no = 1;
                  foreach($menu as $u){ 
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->nama ?></td>
                    <td><?php echo $u->harga ?></td>
                    <td><a href="<?= base_url(); ?>home/aku/<?= $data['id_menu']; ?>">Pesan</a></td>
                    </td>
                  </tr>
                <?php } ?>
              </thead>
              </table>
            </div>
          </table>
          <table >
            <tr>
               <td><h2><a href="<?= base_url('home/daftar'); ?>">Daftar Pesanan</a></h2></td>             
            </tr>
          </table>
          </h4>
  </section>
