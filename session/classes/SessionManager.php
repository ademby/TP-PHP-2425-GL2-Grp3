<?php

/**
 * Class SessionManager
 * Cette classe gère les sessions pour suivre le nombre de visites d'un utilisateur.
 */
class SessionManager {
    /**
     * Démarre la session.
     */
    public function start(): void {
        session_start();
    }

    /**
     * Incrémente le nombre de visites si la variable de session 'number_of_visits' est définie
     * sinon  l'initialise à 1.
     */
    public function inc_visits(): void {
        if (!isset($_SESSION['number_of_visits'])) {
            $_SESSION['number_of_visits'] = 1;
        } else {
            $_SESSION['number_of_visits']++;
        }
    }

    /**
     * @return string Un message de bienvenue ou de remerciement selon le nombre de visites.
     */
    public function get_message(): string {
        if (!isset($_SESSION['number_of_visits']) || $_SESSION['number_of_visits']==1) {
            return " Bienvenu à notre plateforme.";
        } else {
            return "Merci pour votre fidélité, c’est votre " . $_SESSION['number_of_visits'] . "éme visite.";
        }
    }

    /**
     * Réinitialise la session(supprime les variables session et détruit la session)
     */
    public function reset(): void {
        session_unset();
        session_destroy();
    }

    /**
     * Exécute la logique principale de gestion de session.
     * @return string Le message à afficher à l'utilisateur.
     */
    public function run(): string {
        $this->start();
        if (isset($_POST['reset'])) {
            $this->reset();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        $this->inc_visits();
        return $this->get_message();
    }
}

?>
