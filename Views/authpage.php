<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wikis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="container-fluid bg-light position-relative shadow ">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5 ">
                <a class="navbar-brand me-2" href="#">
                    <img src="public/assets/images/logo.png" height="66" alt="Logo" />
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <span></span>
                    <span>
                        <?php
                        echo ($_SESSION['nom']);
                        ?>
                    </span>
                    <a href="./index.php?route=logout" class="btn btn-danger">Logout</a>
                </div>
            </nav>
        </div>
    </header>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
        Add a Wiki
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Article</h5>
                </div>
                <div class="modal-body">
                    <!-- Article Form -->
                    <form id="articleForm" method="POST" action="AuthController.php?route=addwiki">
                        <div class="form-group">
                            <label for="articleTitle">Title</label>
                            <input type="text" name="titre" class="form-control" id="articleTitle"
                                placeholder="Enter article title">
                        </div>
                        <div class="form-group">
                            <label for="articleContent">Content</label>
                            <textarea class="form-control" name="contenu" id="articleContent" rows="5"
                                placeholder="Enter article content"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="articleTag">Category</label>
                                <?php foreach ($categories as $dashboard): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="categorie"
                                            value="<?php echo $dashboard['id']; ?>">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <?php echo $dashboard['nom']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="articleTag">Tags</label>
                                <?php foreach ($tags as $Dashboard): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" name="tags[]" type="checkbox"
                                            value="<?php echo $Dashboard['id']; ?>">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <?php echo $Dashboard['nom']; ?>
                                        </label>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addwiki" class="btn btn-warning">Save Article</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>titre </th>
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
                        <button type="button" class="text-light btn " style="background-color:#565f79;"
                            data-bs-toggle="modal" data-bs-target="#exampleModal<?= $wiki['id'] ?>">
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
                                        <button type="submit" class="btn btn-outline-danger" name="isaccept">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>