<!--
<img class='image img-fluid w-40' src='<?= PK_LIST[0]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[1]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[2]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[3]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[4]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[5]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[6]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[7]["image"]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_LIST[8]["image"]; ?>' alt=''>

<img class='image img-fluid w-40' src='<?= PK_T[PK_T_N]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_T[PK_T_F]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_T[PK_T_W]; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= PK_T[PK_T_G]; ?>' alt=''>

<img class='image img-fluid w-40' src='<?= IMAGES_DIR . "hit.png"; ?>' alt=''>
<img class='image img-fluid w-40' src='<?= IMAGES_DIR . "hp.png"; ?>' alt=''>

<div class="fs-2 pixelated p-3"> hi mom </div>
-->

<!-- pick
<form method="post" class="">
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="exclude" name="exclude" required>
            <label class="form-check-label" for="exclude">
                exclude elemental pokemons
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Pick Duel</button>
</form>
-->

<form method="post" class="text-center">
    <button type="submit" name="fight" class="btn btn-primary">Start Duel</button>
</form>

<!--<img class='image img-fluid w-40' src='<?= PK_LIST[0]["image"]; ?>' alt=''>-->
<!--
<div class="container py-2">
    <div class="row mx-3 mb-2"> 
        <div class="col-md-6 mb-3">
            <div class="card border-4 h-100">
                <div class="d-flex justify-content-center p-3 pb-0">
                <img src='<?= PK_LIST[3]["image"]; ?>'
                    class='img-fluid w-75 h-auto' >
                
                    <div class="position-absolute top-0 start-50 translate-middle-x text-center" style="width: 40%">
                        <img src='<?= IMAGES_DIR . "hit.png"; ?>' class="img-fluid">
                        <div class="position-absolute top-50 start-50 translate-middle w-auto pixelated
                            h2 text-warning" 
                            style="text-shadow: 2px 2px 0 #000;">
                            - 25
                        </div>
                    </div>
                
                    <img src='<?= PK_T[PK_T_F]; ?>'
                    class="position-absolute top-0 start-0 translate-right-x"
                    style="width: 15%; height: auto;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-danger text-center p-2">
                        <div class="d-inline-flex align-items-center gap-1">
                            <span class="pixelated fs-1">
                                X'HP: 375
                            </span>
                            <img src='<?= IMAGES_DIR . "hp.png"; ?>' alt='' 
                                class="d-block mx-auto w-auto"
                                style="height: 1.5em;"
                            >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-4 h-100">
                <div class="d-flex justify-content-center p-3 pb-0">
                <img src='<?= PK_LIST[8]["image"]; ?>'
                    class='img-fluid w-75 h-auto' 
                    style="transform: scaleX(-1);">
                
                    <div class="position-absolute top-0 start-50 translate-middle-x text-center" style="width: 40%">
                        <img src='<?= IMAGES_DIR . "hit.png"; ?>' class="img-fluid">
                        <div class="position-absolute top-50 start-50 translate-middle w-auto pixelated
                            h1 text-danger" 
                            style="text-shadow: 2px 2px 0 #000;">
                            - 100
                        </div>
                    </div>
                
                    <img src='<?= PK_T[PK_T_G]; ?>'
                    class="position-absolute top-0 start-0 translate-right-x"
                    style="width: 15%; height: auto;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-danger text-center p-2">
                        <div class="d-inline-flex align-items-center gap-1">
                            <span class="pixelated fs-1">
                                Y'HP: 300
                            </span>
                            <img src='<?= IMAGES_DIR . "hp.png"; ?>' alt='' 
                                class="d-block mx-auto w-auto"
                                style="height: 1.5em;"
                            >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="alert alert-success">
        Winner is X
    </div>

    <div class="alert alert-secondary">
        Both died, War is not A Game
    </div>
</div>
-->


<!--
<div class="container py-2">
    <div class="row mx-3 mb-2"> 
        <div class="col-md-6 mb-3">
            <div class="card border-4 h-100">
                <div class="d-flex justify-content-center p-3 pb-0">
                    <img src='<?= PK_LIST[3]["image"]; ?>'
                        class='img-fluid w-75 h-auto' >
                    <img src='<?= PK_T[PK_T_G]; ?>'
                        class="position-absolute top-0 start-0 translate-right-x"
                        style="width: 15%; height: auto;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-4 h-100">
                <div class="d-flex justify-content-center p-3 pb-0">
                    <img src='<?= PK_LIST[3]["image"]; ?>'
                        class='img-fluid w-75 h-auto' >
                    <img src='<?= PK_T[PK_T_G]; ?>'
                        class="position-absolute top-0 start-0 translate-right-x"
                        style="width: 15%; height: auto;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                    <li class="list-group-item text-center p-2">
                        lorem ipsum
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
-->