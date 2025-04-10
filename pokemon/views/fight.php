<?php
function renderPokemonMove($pokemon, $damage, $isLeft) {
    // Determine the Pokémon type and corresponding image
    $pokemonType = Utils::determine_pokemon_type($pokemon);
    $typeImage = PK_T[$pokemonType] ?? ''; 

    // Get Pokémon details using getters
    $pokemonImage = $pokemon->getUrl();
    $hp = $pokemon->getHp();
    $isCritical = $damage['isCritical'];

    $imageClass = $isLeft ? '' : 'style="transform: scaleX(-1);"';

    // Set the damage display style based on whether it's critical
    $damageClass = $isCritical ? 'text-danger' : 'text-warning';
    $damageDisplay = "<div class='pixelated h2 {$damageClass}'>- {$damage['damage']}</div>";

    // Create the card HTML
    $cardHtml = "
    <div class='col-md-6 mb-3'>
        <div class='card border-4 h-100'>
            <div class='d-flex justify-content-center p-3 pb-0'>
                <img src='{$pokemonImage}' class='img-fluid w-75 h-auto' {$imageClass}>
                
                <div class='position-absolute top-0 start-50 translate-middle-x text-center' style='width: 40%'>
                    <img src='" . IMAGES_DIR . "hit.png' class='img-fluid'>
                    <div class='position-absolute top-50 start-50 translate-middle w-auto'>
                        {$damageDisplay}
                    </div>
                </div>
                
                <img src='{$typeImage}' class='position-absolute top-0 start-0 translate-right-x' style='width: 15%; height: auto;'>
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item list-group-item-danger text-center p-2'>
                    <div class='d-inline-flex align-items-center gap-1'>
                        <span class='pixelated fs-1'>
                            HP: {$hp}
                        </span>
                        <img src='" . IMAGES_DIR . "hp.png' alt='' class='d-block mx-auto w-auto' style='height: 1.5em;'>
                    </div>
                </li>
            </ul>
        </div>
    </div>";

    return $cardHtml;
}


function renderDuel() {
    global $l, $r;
    
    $res = "";
    $res .= "<div class='row mx-3 mb-2'>"; // Start the row for the duel
    // Loop while both Pokémon are alive
    while (!$l->isDead() && !$r->isDead()) {
        $ldmg = $l->attack($r);
        $rdmg = $r->attack($l);

        // Update HP after the attack
        $l->setHP(max(0, $l->getHp() - $rdmg['damage']));
        $r->setHP(max(0, $r->getHp() - $ldmg['damage']));

        // Render the moves for both Pokémon
        $res .= renderPokemonMove($l, $rdmg, true);
        $res .= renderPokemonMove($r, $ldmg, false);
    }

    $res .= "</div>"; // End the row for the duel

    // Determine the outcome
    if ($l->isDead() && $r->isDead()) {
        // Both Pokémon are dead
        $res .= "<div class='alert alert-secondary'>Both Pokémon have fallen in battle. It's a tragic draw!</div>";
    } elseif ($l->isDead()) {
        // Pokémon l is dead
        $res .= "<div class='alert alert-success'>{$r->getName()} emerges victorious! The battle is won!</div>";
    } elseif ($r->isDead()) {
        // Pokémon r is dead
        $res .= "<div class='alert alert-success'>{$l->getName()} claims victory! A glorious win!</div>";
    }

    return $res; // Return the accumulated result
}
?>
<div class="mt-3"></div>
<?= renderDuel(); ?>