<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FavMlist $favMlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- <li class="heading"><?= __('Actions') ?></li> -->
        <li><?= $this->Html->link(__('Edit this Favorite'), ['action' => 'edit', $favMlist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete this Favorite'), ['action' => 'delete', $favMlist->id], ['confirm' => __('"{0}" を削除しますか？', $favMlist->title)]) ?> </li>
        <li><?= $this->Html->link(__('Add Favorite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Return My List'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="favMlist view large-9 medium-8 columns content">
    <h3><?= h($favMlist->title) ?></h3>
    <table class="vertical-table">
        <!-- <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($favMlist->title) ?></td>
        </tr> -->
        <tr>
            <th scope="row" class="view-col"><?= __('Player') ?></th>
            <td><?= h($favMlist->player) ?></td>
        </tr>
        <tr>
            <th scope="row" class="view-col"><?= __('Genre') ?></th>
            <td><?= h($favMlist->genre) ?></td>
        </tr>
        <tr>
            <th scope="row" class="view-col"><?= __('Url') ?></th>
            <td class="yt-widget"><?= $favMlist->url ?></td>
        </tr>
        <!-- <tr>
            <th scope="row" class="view-col"><?= __('Image') ?></th>
            <td><?= h($favMlist->image) ?></td>
        </tr> -->
        <tr>
            <th scope="row" class="view-col"><?= __('Id') ?></th>
            <td><?= $this->Number->format($favMlist->id) ?></td>
        </tr>
    </table>
</div>
