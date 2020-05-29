<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">

        <div class="tabel1" style="background-color: brown;">
          <h4 class="section-heading mb-4">
            <table class="table">
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Harga</th>
                      <th>KETERANGAN</th>
                    </tr>
                  </thead>

                  <?php $nomor = 0;
                  $index = 0;
                  $jumlah = 0;
                  ?>
                  <?php foreach ($io as $nested1) : ?>
                    <?php foreach ($nested1 as $nested2) : ?>
                      <?php $nomor = $nomor + 1; ?>
                      <tr>
                        <th><?= $nomor ?></th>
                        <td><?= $nested2['nama']; ?></td>
                        <td><?= $nested2['harga']; ?></td>
                        <td style="text-align:center;"><a class="btn btn-danger" href="<?= base_url('home/menu/'); ?><?= $index ?>" style="height: 40px; text-align:center;">Hapus</a></td>
                      </tr>
                    <?php
                      $index = $index + 1;
                      //menghitung total harga
                      $jumlah = $jumlah + $nested2['harga'];
                    endforeach ?>
                  <?php endforeach ?>



                  <div class="col-2">
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Total = <?= $jumlah ?></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
              </div>
</section>