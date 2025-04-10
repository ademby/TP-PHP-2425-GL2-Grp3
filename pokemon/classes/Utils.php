<?php
class Utils {
    /**
     * Vérifie si deux IDs de Pokémon sont valides et différents
     * @param int $pk1 ID du premier Pokémon
     * @param int $pk2 ID du deuxième Pokémon
     * @return bool True si les deux IDs sont valides et différents
     */
    public static function validate_pks(int $pk1, int $pk2): bool {
        return ($pk1 >= 0 && $pk1 < PK_LIST_LEN) &&
               ($pk2 >= 0 && $pk2 < PK_LIST_LEN) &&
               ($pk1 !== $pk2);
    }

    /**
     * Choisit deux IDs de Pokémon aléatoires et différents
     * @param bool $exclude Exclure les Pokémon élémentaires si true
     * @return array[int, int] Deux IDs de Pokémon différents
     */
    public static function pick2pks(bool $exclude): array {
        $max = $exclude ? PK_LIST_N_LEN : PK_LIST_LEN;
        
        $first = random_int(0, $max - 1);
        $second = (1 + $first + random_int(0, $max - 2)) % $max;
        
        return [$first, $second];
    }

    public static function determine_pokemon_type(Pokemon $pokemon) {
        if ($pokemon instanceof PokemonFeu) {
            return PK_T_F; // Fire type
        } elseif ($pokemon instanceof PokemonEau) {
            return PK_T_W; // Water type
        } elseif ($pokemon instanceof PokemonPlante) {
            return PK_T_G; // Grass type
        }
        return PK_T_N;
    }

    public static function create_pokemon($idx) {
        if ($idx < 0 || $idx >= PK_LIST_LEN) {
            throw new InvalidArgumentException("Index out of bounds.");
        }

        $data = PK_LIST[$idx];

        $attackPokemon = new AttackPokemon(
            $data['minAtk'],
            $data['maxAtk'],
            $data['critCoef'],
            $data['critProb']
        );

        switch ($data['type']) {
            case PK_T_F:
                return new PokemonFeu($data['name'], $data['image'], $data['hp'], $attackPokemon);
            case PK_T_W:
                return new PokemonEau($data['name'], $data['image'], $data['hp'], $attackPokemon);
            case PK_T_G:
                return new PokemonPlante($data['name'], $data['image'], $data['hp'], $attackPokemon);
            case PK_T_N:
            default:
                return new Pokemon($data['name'], $data['image'], $data['hp'], $attackPokemon);
        }
    }
    
}
?>