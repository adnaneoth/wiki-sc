<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wikis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
                    <span ></span>
                    <span> <?php
                    echo($_SESSION['nom']);
                    ?>
                    </span>
                    <a href="./index.php?route=logout" class="btn btn-danger">Logout</a>
                </div>
            </nav>
        </div>
    </header>
    
    <table class="container__table mx-5 w-100">
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

</body>

</html>