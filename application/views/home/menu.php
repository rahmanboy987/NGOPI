<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-lower">MENU</span>
          </h2>
          <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
            <li class="list-unstyled-item list-hours-item d-flex">
              <b>NAMA MENU</b> <span class="ml-auto"> <b>HARGA</b></span>
            </li>
            <?php foreach ($menu->result_array() as $row) {  ?>
              <li class="list-unstyled-item list-hours-item d-flex">
                <?= $row['nama_produk'] ?> <span class="ml-auto"><?= $row['harga_jual'] ?></span>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>