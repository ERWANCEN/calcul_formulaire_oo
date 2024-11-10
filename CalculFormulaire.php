<?php

// je crée une classe que j'appelle 'CalculFormulaire'
class CalculFormulaire
{
    /**
     * Propriété qui s'affichera accompagnée de la réponse si tout est correct
     *
     * @var string
     */
    private string $_resultat = "<p class=\"alert alert-primary\">Le résultat de votre opération est : ";

    /**
     * Propriété qui va stocker les erreurs si il y en a
     *
     * @var string
     */
    private string $_error = "";

    /**
     * Méthode qui permet de transformer chaque élément du tableau reçu en variables ainsi que les envoyer au commutateur pour vérifier les potentielles erreurs et préparer la solution
     *
     * @param array $post
     */
    public function __construct(array $post)
    {
        $extractPost = extract($post);
        $this->setResultat($val1, $operator, $val2);
    }

    /**
     * Vérifie les potentielles erreurs et prépare la solution
     *
     * @param integer $val1
     * @param string $operator
     * @param integer $val2
     * @return void
     */
    public function setResultat(int $val1, string $operator, int $val2)
    {
        if (!is_int($val1) || !is_int($val2)) {
            $this->_resultat = "Merci de n'entrer que des chiffres.";
        } else {
            if ($operator === "addition") {
                $this->_resultat .= $val1 + $val2 . "</p>";
            } elseif ($operator === "soustraction") {
                $this->_resultat .= $val1 - $val2 . "</p>";
            } elseif ($operator === "multiplication") {
                $this->_resultat .= $val1 * $val2 . "</p>";
            } elseif ($operator === "division") {
                if ($val2 === 0) {
                    $this->_error = "<p class=\"alert alert-danger\">Une division par 0 est impossible.";
                } else {
                    $this->_resultat .= $val1 / $val2 . "</p>";
                }
            } else {
                $this->_error = "<p class=\"alert alert-danger\">Il semblerait qu'il y ait un problème avec le choix de l'opérateur.</p>";
            }
        }
    }

    /**
     * Permet de retourner soit les erreurs, soit la réponse
     *
     * @return void
     */
    public function getResultat()
    {
        if (!empty($this->_error)) {
            return $this->_error;
        } else {
            return $this->_resultat;
        }
    }
    
}