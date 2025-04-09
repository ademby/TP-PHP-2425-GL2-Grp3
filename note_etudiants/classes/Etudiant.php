<?php

/**
 * Classe représentant un étudiant avec un nom et des notes
 */
class Etudiant
{
    /** @var string Nom de l'étudiant */
    private string $nom;
    
    /** @var array<float> Liste des notes de l'étudiant */
    private array $notes;

    /**
     * Constructeur
     * @param string $nom Nom de l'étudiant
     * @param array<float> $notes Liste des notes
     */
    public function __construct(string $nom, array $notes)
    {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    /**
     * Calcule la moyenne des notes
     * @return float La moyenne (0 si aucune note)
     */
    public function calculerMoyenne(): float
    {
        if (count($this->notes) === 0) {
            return 0.0;
        }
        
        return array_sum($this->notes) / count($this->notes);
    }

    /**
     * Détermine si l'étudiant est admis (moyenne >= 10)
     * @return bool True si admis, false sinon
     */
    public function estAdmis(): bool
    {
        return $this->calculerMoyenne() >= 10;
    }

    /*
    <ul class="list-group">
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item list-group-item-primary">This is a primary list group item</li>
        ...
    </ul>
    */

    /**
     * Affiche les informations basiques de l'étudiant (juste le nom)
     */
    public function afficher(): void
    {
        echo "<ul class='list-group'>";
        echo "<li class='list-group-item'>" . htmlspecialchars($this->nom) . "</li>";
        foreach ($this->notes as $note) {
            if ($note > 10) {
                $colorClass = "list-group-item-success";
            } elseif ($note < 10) {
                $colorClass = "list-group-item-danger";
            } else {
                $colorClass = "list-group-item-warning";
            }
            echo "<li class='list-group-item $colorClass'>" . htmlspecialchars($note) . "</li>";
        }
        $moy = $this->calculerMoyenne();
        echo "<li class='list-group-item list-group-item-primary'>Votre moyenne est $moy</li>";
        echo "</ul>";
    }
}
?>