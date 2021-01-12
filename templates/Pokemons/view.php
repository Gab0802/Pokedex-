<head><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

            <!-- Lien vers Dashboard sur page view -->
            <h5>
                <?php echo $this->Html->link("Dashboard ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'button-dashboard')) ?>
            </h5>
        </div>

    </aside>

    <!-- carousel -->
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <h3 style='text-align:center'><?= h($pokemon->name) ?></h3>
        <table>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-30"  src="<?= h($pokemon->default_front_sprite_url) ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-30"  src="<?= h($pokemon->default_back_sprite_url) ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-30"  src="<?= h($pokemon->front_shiny_sprite_url) ?>" alt="Third slide">
                </div>
            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                 </a>
            </div>
        <!-- type sur la view -->
            <div class="col-sm">
                <div>
                    <div class="card custom"> <!-- double classe pour faire le CSS -->
                        <h3 class="card__type <?= $pokemon->first_type ?>">
                            <?= $pokemon->first_type ?>
                        </h3>

                        <?php if ($pokemon->has_second_type) : ?>
                            <h3 class="card__second_type <?= $pokemon->second_type ?>">
                                <?= $pokemon->second_type ?>
                            </h3>
                        <?php endif ?>
                    </div>
                    </div>
                    </div>

        <!-- tableau de caractéristiques -->
            <div class="related">
                <h4><?= __('Related Pokemon Stats') ?></h4>
                <?php if (!empty($pokemon->pokemon_stats)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Stat Id') ?></th>
                                <th><?= __('Value') ?></th>
                            </tr>
                            <?php $name = array("HP", "Attack", "Defense", "Special attack", "Special defense", "Speed");
                            foreach ($pokemon->pokemon_stats as $key => $pokemonStats) : ?>
                                <tr>
                                    <th><?php print($name[$key]) ?></th>
                                    <td><?= $this->Number->format($pokemonStats->value) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            </table>
        </div>

    </div>
</div>
</div>
</div>