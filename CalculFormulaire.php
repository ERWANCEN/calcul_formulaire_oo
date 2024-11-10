<?php

class CalculFormulaire
{
    private string $_resultat = "<p class=\"alert alert-primary\">Le résultat de votre opération est : ";
    private string $_error = "";
    public function __construct(array $post)
    {
        $extractPost = extract($post);
        $this->setResultat($val1, $operator, $val2);
    }

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

    public function getResultat()
    {
        if (!empty($this->_error)) {
            return $this->_error;
        } else {
            return $this->_resultat;
        }
    }
    
}