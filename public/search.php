<div class="row" id="search_list" >
    <?php foreach ($allWikis as $wiki): ?>
      <div class="col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center">
        <a href="./index.php?route=wikishow&id=<?=$wiki['id']?>" class="card stretched-link text-decoration-none">
          <div style="max-width: 23rem;" class="card">
            <img src="<?= APP_URL ?>public/assets/images/wiki.JPG"" alt="gara">
              <!-- style="height: 9rem;" class="my-2 position-relative"> -->
            <div class="card-body">
              <div class="card-head">
                <h5 class="card-title fw-semibold text-center">
                  <?= $wiki['titre'] ?>
                </h5>
                <p class="text-center">
                  <?= $wiki['nom'] ?>
                </p>
                <p class="card-text text-center text-truncate">
                  <?= $wiki['contenu'] ?>
                </p>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>