<style>
    * {
        padding: 0;
        margin: 0;
    }

    .card_container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #000;
    }

    .card {
        width: 350px;
        height: 30rem;
        border-radius: 14px;
        padding: 20px;
        position: relative;

    }

    .card .card-container {
        width: 100%;
        height: 100%;
        position: relative;
        background-color: #fff;
        z-index: 10;
        border-radius: 10px;
        padding: 15px;
        padding-top: 50px;

    }

    .card-container h4 {
        font-size: 26px;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 17px;
    }

    .card::before {
        position: absolute;
        content: '';
        background-color: #fc5185;
        height: 35px;
        width: 35px;
        top: 3rem;
        right: -23px;
        transform: rotate(45deg);
        z-index: 10;

    }


    .card::after {
        position: absolute;
        content: attr(data-label);
        top: 27px;
        padding-left: 20px;
        padding: 10px;
        right: -31px;
        width: 8rem;
        background-color: #fc5185;
        z-index: 12;
        border-bottom-left-radius: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 10px;
        color: #fff;
    }
</style>

<body>
<div class="card_container">
    <div class="card" data-label="<?= $wiki['nom'] ?>">
        <div class="card-container">
            <h4><?= $wiki['titre'] ?></h4>
              <P><?= $wiki['contenu'] ?>.</P>
        </div>
    </div>
</div>

</body>