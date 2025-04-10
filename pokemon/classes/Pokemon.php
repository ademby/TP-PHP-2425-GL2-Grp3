<?php

class Pokemon {
    private $name;
    private $url;
    private $hp;
    private $attackPokemon;

    public function __construct(
        string $name,
        string $url,
        int $hp,
        AttackPokemon $attackPokemon
    ) {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getHp(): int {
        return $this->hp;
    }

    public function getAttackPokemon(): AttackPokemon {
        return $this->attackPokemon;
    }

    // Setters
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setUrl(string $url): void {
        $this->url = $url;
    }

    public function setHp(int $hp): void {
        $this->hp = $hp;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon): void {
        $this->attackPokemon = $attackPokemon;
    }

    // Méthodes
    public function isDead(): bool {
        return $this->hp <= 0;
    }

    public function whoAmI(): string {
        $type = Utils::determine_pokemon_type($this);
        return "<div class='col-md-6 mb-3'>
                <div class='card border-4 h-100'>
                    <div class='d-flex justify-content-center p-3 pb-0'>
                        <img src='{$this->url}' class='img-fluid w-75 h-auto'>
                        <img src='" . PK_T[$type] . "' class='position-absolute top-0 start-0 translate-right-x' style='width: 15%; height: auto;'>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item text-center p-2'>Name: {$this->getName()}</li>
                        <li class='list-group-item text-center p-2'>HP: {$this->getHp()}</li>
                        <li class='list-group-item text-center p-2'>Min Attack: {$this->getAttackPokemon()->getAttackMinimal()}</li>
                        <li class='list-group-item text-center p-2'>Max Attack: {$this->getAttackPokemon()->getAttackMaximal()}</li>
                        <li class='list-group-item text-center p-2'>Critical Coefficient: {$this->getAttackPokemon()->getSpecialAttack()}</li>
                        <li class='list-group-item text-center p-2'>Critical Probability: {$this->getAttackPokemon()->getProbabilitySpecialAttack()}%</li>
                    </ul>
                </div>
            </div>";
    }

    /**
     * Attack another Pokémon and calculate damage.
     * @param Pokemon $p The target Pokémon to attack
     * @return array An associative array containing 'damage' and 'isCritical'
     */
    public function attack(Pokemon $p): array {
        $attackerType = Utils::determine_pokemon_type($this);
        $defenderType = Utils::determine_pokemon_type($p);

        // Get attacker's stats
        $minAtk = $this->getAttackPokemon()->getAttackMinimal();
        $maxAtk = $this->getAttackPokemon()->getAttackMaximal();
        $critCoef = $this->getAttackPokemon()->getSpecialAttack();
        $critProb = $this->getAttackPokemon()->getProbabilitySpecialAttack();

        // Calculate damage
        $baseDamage = random_int($minAtk, $maxAtk);
        $isCritical = random_int(0, 100) < $critProb;
        $damageMultiplier = $isCritical ? $critCoef : 1;

        // Get damage multiplier based on type interactions
        $typeKey = "{$attackerType}>{$defenderType}";
        $damageMultiplier *= DMG_MUL[$typeKey] ?? 1;

        // Calculate final damage
        $finalDamage = (int)($baseDamage * $damageMultiplier);

        // Return both damage and critical hit status
        return [
            'damage' => $finalDamage,
            'isCritical' => $isCritical
        ];
    }


}
