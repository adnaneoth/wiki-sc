<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/assets/css/dashb.css">
    <title>Document</title>
</head>




<body>
   
    <div class="menu">
        <ul class="menu__list">
            <li class="menu__list__item menu__list__item__profile">
                <div class="menu__profile">
                    <img src="<?= APP_URL ?>public/assets/images/admin_prfl.jpg" alt="">
                </div>
                <h4 class="menu__profile__name">othmane adnane</h4>
            </li>
            <li class="menu__list__item">
                <a href="">
                    <i class="fas fa-home"></i>
                    <p>home</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="">
                    <i class="fas fa-user-group"></i>
                    <p>users</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="">
                    <i class="fas fa-table"></i>
                    <p>dashboard</p>
                </a>
            </li>
            <li class="menu__list__item">
                <a href="">
                    <i class="fas fa-chart-pie"></i>
                    <p>dashboard</p>
                </a>
            </li>

            <li class="menu__list__item__logout">
                <a href="./index.php?route=logout">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>

    </div>


    <main class="container">
        <div class="container__header">
            <h3>dashboard</h3>
            <i class="fas fa-chart-pie"></i>
        </div>
        <div class="container__statistique">
            <div class="container__statistique__data">
                <i class="fas fa-user"></i>
                <div class="container__statistique__info">
                    <p>users</p>
                    <p class="container__statistique__detail">
                        <?= count($users) ?>
                    </p>
                </div>
            </div>
            <div class="container__statistique__data">
                <i class="fas fa-pen"></i>
                <div class="container__statistique__info">
                    <p>wikis archived</p>
                    <p class="container__statistique__detail">
                        <?= count($wikis) ?>
                    </p>
                </div>
            </div>

            <!-- wikis accepted -->

            <div class="container__statistique__data">
                <i class="fas fa-pen"></i>
                <div class="container__statistique__info">
                    <p>wikis accepted</p>
                    <p class="container__statistique__detail">
                        <?= count($wikis) ?>
                    </p>
                </div>
            </div>

            <!-- end wikis accepted -->




            <div class="container__statistique__data">
                <i class="fas fa-tag"></i>
                <div class="container__statistique__info">
                    <p>tags</p>
                    <p class="container__statistique__detail">
                        <?= count($tags) ?>
                    </p>
                </div>
            </div>


        </div>


        <table class="container__table">
            <thead>
                <tr>
                    <th>titre (wikis archived)</th>
                    <th>Nom Categorie</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wikis as $wiki): ?>

                    <tr>
                        <td>
                            <?= $wiki['titre'] ?>
                        </td>
                        <td>
                            <?= $wiki['nom'] ?>
                        </td>
                        <td>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?= $wiki['id'] ?>">
                                voir wiki
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $wiki['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark " id="exampleModalLabel">
                                                <?= $wiki['titre'] ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark ">
                                            <?= $wiki['contenu'] ?>
                                        </div>
                                        <form action="./index.php?route=wikiaccept" method="post">
                                            <input type="hidden" name="id" value="<?= $wiki['id'] ?>"></br>
                                            <button type="submit" class="btn btn-outline-primary"
                                                name="isaccept">accepter</button>
                                        </form>
                                        <form action="./index.php?route=wikidelete" method="post">
                                            <input type="hidden" name="id" value="<?= $wiki['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger"
                                                name="isaccept">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>


        <!-- wikiaccept affich -->

        <table class="container__table">
            <thead>
                <tr>
                    <th>titre (wikis accepted)</th>
                    <th>Nom Categorie</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wikisaccepted as $wikiaccepted): ?>

                    <tr>
                        <td>
                            <?= $wikiaccepted['titre'] ?>
                        </td>
                        <td>
                            <?= $wikiaccepted['nom'] ?>
                        </td>
                        <td>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalaccept<?= $wikiaccepted['id'] ?>">
                                voir wiki
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalaccept<?= $wikiaccepted['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark " id="exampleModalLabel">
                                                <?= $wikiaccepted['titre'] ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark ">
                                            <?= $wikiaccepted['contenu'] ?>
                                        </div>
                                        <form action="./index.php?route=wikiarchive" method="post">
                                            <input type="hidden" name="id" value="<?= $wikiaccepted['id'] ?>"></br>
                                            <button type="submit" class="btn btn-outline-primary"
                                                name="isaccept">arichve</button>
                                        </form>
                                        <form action="./index.php?route=wikidelete" method="post">
                                            <input type="hidden" name="id" value="<?= $wikiaccepted['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger"
                                                name="isaccept">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>

        <!-- end wikis accepted affich -->

        <!-- user affich -->
        <div>
            <div class="container__header">
                <h3>Users</h3>
                <i class="fas fa-user-group"></i>
            </div>

            <table class="container__table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>email</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>



                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?= $user['nom'] ?>
                            </td>
                            <td>
                                <?= $user['email'] ?>
                            </td>
                            <td>
                                <?= $user['role'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end user affich -->
        <div class="container mt-4 row">

            <div class="col-md-6">
                <div class="container__header">
                    <h3>Tags </h3>

                    <i class="fas fa-tag"></i>
                </div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajoute
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark " id="exampleModalLabel">Ajouter Wiki</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark ">

                                <form action="./index.php?route=addTags" method="post">
                                    <div class="form-group">
                                        <label for="tag">Nom Tag</label>
                                        <input type="text" class="form-control" id="nom_tag" name="nom_tag"
                                            aria-describedby="tag" placeholder="Enter Tag">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>



                            </div>


                        </div>
                    </div>
                </div>

                <table class="container__table">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        foreach ($tags as $tag): ?>


                            <tr>
                                <td>
                                    <?= $tag["nom"] ?>
                                </td>
                                <td>


                                    <div class="btn btn-outline-primary">modifier</div>
                                    <form action="./index.php?route=tagdelete" method="post">
                                        <input type="hidden" name="id" value="<?= $tag['id'] ?>">
                                        <button type="submit" class="btn btn-outline-danger">supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- categories affich -->
            <div class="col-md-6">
                <div class="container__header">
                    <h3>Categories </h3>

                    <i class="fas fa-tag"></i>
                </div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCat">
                    Ajoute
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCat" tabindex="-1" aria-labelledby="exampleModalLabelCat"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark " id="exampleModalLabel">Ajouter categorie</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark ">

                                <form action="./index.php?route=addCategories" method="post">
                                    <div class="form-group">
                                        <label for="categorie">Nom categorie</label>
                                        <input type="text" class="form-control" id="nom_categorie" name="nom_categorie"
                                            aria-describedby="categorie" placeholder="Enter Categorie">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>



                            </div>


                        </div>
                    </div>
                </div>

                <table class="container__table">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        foreach ($categories as $categorie): ?>


                            <tr>
                                <td>
                                    <?= $categorie["nom"] ?>
                                </td>
                                <td>


                                    <div class="btn btn-outline-primary">modifier</div>
                                    <form action="./index.php?route=categoriedelete" method="post">
                                        <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
                                        <button type="submit" class="btn btn-outline-danger">supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- <div class="container__header">
            <h3>Tags Statistiques</h3>
            <i class="fas fa-table"></i>
        </div>

        <table class="container__table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td>
                        <div class="btn btn-outline-primary">modifier</div>
                        <div class="btn btn-outline-danger">supprimer</div>
                    </td>
                </tr>

            </tbody>
        </table> -->

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>