<?php

class AttackPokemon {
    private $attackMinimal;
    private $attackMaximal;
    private $specialAttack;
    private $probabilitySpecialAttack;

    public function __construct(
        int $attackMinimal,
        int $attackMaximal,
        float $specialAttack,
        int $probabilitySpecialAttack
    ) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }

    // Getters
    public function getAttackMinimal(): int {
        return $this->attackMinimal;
    }

    public function getAttackMaximal(): int {
        return $this->attackMaximal;
    }

    public function getSpecialAttack(): float {
        return $this->specialAttack;
    }

    public function getProbabilitySpecialAttack(): int {
        return $this->probabilitySpecialAttack;
    }

    // Setters
    public function setAttackMinimal(int $attackMinimal): void {
        $this->attackMinimal = $attackMinimal;
    }

    public function setAttackMaximal(int $attackMaximal): void {
        $this->attackMaximal = $attackMaximal;
    }

    public function setSpecialAttack(float $specialAttack): void {
        $this->specialAttack = $specialAttack;
    }

    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack): void {
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
}

?>