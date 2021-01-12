<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard $row
 * @var \App\Model\Entity\Dashboard $data
 * @var \App\Model\Entity\Dashboard $nBPokemon4th
 * @var \App\Model\Entity\Dashboard $allWeight
 * @var \App\Model\Entity\Dashboard $data4th
 * @var \App\Model\Entity\Dashboard $avgWeight
 * @var \App\Model\Entity\Dashboard $allFairyPokemons
 * @var \App\Model\Entity\Dashboard $nBPokemon1th3th7th
 * @var \App\Model\Entity\Dashboard $speedNameTab
 */
?>


<div class="container">
    <div class="container-top">
        <!--Poids moyen-->
        <div class="wrap">
            <h2 style="margin-top: 47px">Poids moyen Pokemons  de la 4ème génération</h2>
            <p> La moyenne de poids des Pokemon de la 4ième génération (387 à 493) est : <strong><?= $moyPoids ?></strong>.</p>
            <p class="gen137"> On dénombre <?= $comptFee ?> Pokemon de type Fée parmis les générations 1, 3 et 7. </p>
        </div>
    </div>
</div>