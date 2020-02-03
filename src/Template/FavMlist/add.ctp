<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FavMlist $favMlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- <li class="heading"><?= __('Actions') ?></li> -->
        <li><?= $this->Html->link(__('Return My List'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="favMlist form large-9 medium-8 columns content">
    <?= $this->Form->create($favMlist) ?>
    <fieldset>
        <legend><?= __('Add Favorite') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('player');
            echo $this->Form->control('genre');
            echo $this->Form->control('url');
            echo $this->Form->control('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
