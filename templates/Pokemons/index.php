<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon[]|\Cake\Collection\CollectionInterface $pokemons
 */
?>
<div class="pokemons index content">
    <h3><?= __('Pokemons') ?></h3>

<!-- Bouton d'accès au Dashbord -> index Dashboard -->
    <ul>
        <li>
            <?php echo $this->Html->link("Dashboard ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'button-dashboard')) ?>
        </li>
    </ul>
    <div class="row">
        <?php foreach ($pokemons as $pokemon) : ?>
                <div class="col-12 col-md-4 col-sm-6 col-xs-12">
                    <?= $this->element('Pokemons/card', ['pokemon' => $pokemon]); ?>
                </div>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
