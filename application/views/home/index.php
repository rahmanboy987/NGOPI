<?php foreach ($highlight->result_array() as $highlight) {
  if ($highlight['template'] == 1) { ?>
    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="asset/img/<?= $highlight['photo'] ?>" alt="<?= $highlight['photo'] ?>">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper"><?= $highlight['mini_text'] ?></span>
              <span class="section-heading-lower"><?= $highlight['name'] ?></span>
            </h2>
            <p class="mb-3"><?= $highlight['description'] ?></p>
          </div>
        </div>
      </div>
    </section>
  <?php } else if ($highlight['template'] == 2) { ?>
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h1 class="section-heading mb-4">
                <span class="section-heading-upper"><?= $highlight['mini_text'] ?></span>
                <span class="section-heading-lower"><?= $highlight['name'] ?></span>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } else if ($highlight['template'] == 3) { ?>
    <section class="page-section">
      <div class="container">
        <div class="product-item">
          <div class="product-item-title d-flex">
            <div class="bg-faded p-5 d-flex ml-auto rounded">
              <h2 class="section-heading mb-0">
                <span class="section-heading-upper"><?= $highlight['mini_text'] ?></span>
                <span class="section-heading-lower"><?= $highlight['name'] ?></span>
              </h2>
            </div>
          </div>
          <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="asset/img/<?= $highlight['photo'] ?>" alt="<?= $highlight['photo'] ?>">
          <div class="product-item-description d-flex mr-auto">
            <div class="bg-faded p-5 rounded">
              <p class="mb-0"><?= $highlight['description'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php }
}  ?>

<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-lower">JADWAL KAMI </span>
          </h2>
          <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
            <?php foreach ($schedule->result_array() as $schedule) {  ?>
              <li class="list-unstyled-item list-hours-item d-flex">
                <?= $schedule['days'] ?> <span class="ml-auto"><?= $schedule['descript'] ?></span>
              </li>
            <?php } ?>
          </ul>
          <p class="address mb-5">
            <em>
              <strong>TEMPAT : </strong>
              <br>
              <?= $this->warkop_settings['place'] ?>
            </em>
          </p>
          <p class="mb-0">
            <small><em>Telfon kami !</em></small>
            <br>
            <?= $this->warkop_settings['phone'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>