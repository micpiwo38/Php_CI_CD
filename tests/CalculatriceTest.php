<?php

namespace App\Tests;

use App\Calculatrice;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    /**
     * Teste que l'addition fonctionne correctement.
     */
    public function testAdditionner(): void
    {
        // 1. Arrange (Préparer l'objet)
        $calculatrice = new Calculatrice();

        // 2. Act (Exécuter l'action)
        $resultat = $calculatrice->additionner(5, 3);

        // 3. Assert (Vérifier le résultat)
        $this->assertEquals(8, $resultat);
        $this->assertEquals(-1, $calculatrice->additionner(2, -3));
    }

    /**
     * Teste que la division standard fonctionne.
     */
    public function testDiviser(): void
    {
        $calculatrice = new Calculatrice();

        $resultat = $calculatrice->diviser(10, 2);

        $this->assertEquals(5, $resultat);
    }

    /**
     * Teste qu'une exception est bien levée en cas de division par zéro.
     */
    public function testDiviserParZeroLanceUneException(): void
    {
        $calculatrice = new Calculatrice();

        // On indique à PHPUnit qu'on s'attend à ce qu'une exception soit levée
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("La division par zéro est impossible.");

        // Cette ligne doit déclencher l'exception
        $calculatrice->diviser(10, 0);
    }
}
