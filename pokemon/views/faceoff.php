<?php
$l = Utils::create_pokemon($get_pk1);
$r = Utils::create_pokemon($get_pk2);
?>
<div class="mt-3 p-3"></div>
<div class="pokemon-faceoff-view ">
    <div class='text-center display-3'>
        contestants:
    </div>
    
    <div class="row mx-3 mb-2">
        <?= $l->whoAmI() ?>
        <?= $r->whoAmI() ?>
    </div>

    <div class="text-center mt-4">
        <form method="post" class="d-inline-block">
            <button type="submit" name="fight" class="btn btn-danger btn-lg">
                <i class="fas fa-bolt"></i> Start Epic Duel!
            </button>
        </form>
    </div>
</div>