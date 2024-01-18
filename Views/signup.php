<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      .card{
	      box-shadow:
		10px 10px 10px #d1d9e6,
		-10px -10px 10px #f9f9f9;
	      border-radius: 12px;
      }
      .Register{
        background-color:#565f79;
      }
    </style>
</head>
<body>
    
</body>
</html>
<section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card-body p-md-5  ">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 card">
  
                  <p class="text-center test-dark h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <!-- <form class="mx-1 mx-md-4" name="myForm" method="POST" action="<?= APP_URL ?>app/Controllers/SignupController.php"> -->
                  <form class="mx-1 mx-md-4" id="form" method="post" action="./index.php?route=signupaction">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label"  for="form3Example1c">Your Name</label>
                                                <input type="text" id="name"name="nom" class="form-control" />
                                                <span class="d-none text-danger" id="name-error">non valider</span>

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label"  for="form3Example3c">Your Email</label>
                                                <input type="email" id="email"name="email" class="form-control" />
                                                <span class="d-none text-danger" id="email-error">non valider</span>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label"  for="form3Example4c">Password</label>
                                                <input type="password" id="password"name="password" class="form-control" />
                                                <span class="d-none text-danger" id="password-error">non valider</span>

                                            </div>
                                        </div>


                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="submit" class="btn btn-lg text-light Register">Register</button>
                                        </div>

                                    </form>

  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="<?= APP_URL ?>public/assets/images/signup.svg"
                    class="img-fluid" alt="sigup">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 ">
    <!-- Copyright -->
    <div class="test-dark mb-3 mb-md-0">
      Copyright Â© 2024. All rights reserved.
    </div>
</div>
  </section>
  <script src="assets/js/signup.js"></script>
</body>
    </html>
