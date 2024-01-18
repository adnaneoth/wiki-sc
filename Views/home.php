<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <title>Document</title>
  <style>
    .cardss{
      background-color: #ecf0f3;
      box-shadow:
        10px 10px 10px #d1d9e6,
        -10px -10px 10px #f9f9f9;
    }
    main img{
      width:100%;
      height: 100vh;
    }
    
    </style>
</head>
<?php
include('../Views/includes/navbar.php');

?>

<body>
  <main>
   <img src="<?= APP_URL ?>public/assets/images/hero.JPG"">
  </main>
  <div class="row" id="search_list" >
    <?php foreach ($allWikis as $wiki): ?>
      <div class="col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center cardss">
        <a href="./index.php?route=wikishow&id=<?=$wiki['id']?>" class="card stretched-link text-decoration-none">
          <div style="max-width: 23rem;" class="card">
            <img src="<?= APP_URL ?>public/assets/images/article.JPG"" alt="gara">
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
  
  <script>
    $(document).ready(function(){

        $("#hero_field").keyup(function(){
            var input = $(this).val(); 
            if(input == "") input = 'all';

            $.ajax({
                url: "index.php?route=search",
                method: "POST",
                data: {input: input},
                success: function(data){
                    $("#search_list").html(data);
                }
            });
        });
    });
</script>
 
  <?php
include('../Views/includes/footer.php');

?>

</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/lib/easing/easing.min.js"></script>
<script src="../../public/assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../../public/assets/lib/isotope/isotope.pkgd.min.js"></script>
<script src="../../public/assets/lib/lightbox/js/lightbox.min.js"></script>

<!-- Contact Javascript File -->
<script src="../../public/assets/js/mail/jqBootstrapValidation.min.js"></script>
<script src="../../public/assets/js/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="../../public/assets/js/main.js"></script>

</html>