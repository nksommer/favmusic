<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FavMlist[]|\Cake\Collection\CollectionInterface $favMlist
 */
?>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- <li class="heading"><?= __('Actions') ?></li> -->
        <li><?= $this->Html->link(__('Add Favorite'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favMlist index large-9 medium-8 columns content">
    <h3>My List</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" class="index-col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="index-col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="index-col"><?= $this->Paginator->sort('player') ?></th>
                <th scope="col" class="index-col"><?= $this->Paginator->sort('genre') ?></th>
                <th scope="col" class="index-col"><?= $this->Paginator->sort('url') ?></th>
                <!-- <th scope="col" class="index-col"><?= $this->Paginator->sort('image') ?></th> -->
                <th scope="col" class="actions index-col"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favMlist as $index => $favMlist): ?>
            <tr>
                <td class="index-data"><?= $this->Number->format($favMlist->id) ?></td>
                <td class="index-data"><?= h($favMlist->title) ?></td>
                <td class="index-data"><?= h($favMlist->player) ?></td>
                <td class="index-data"><?= h($favMlist->genre) ?></td>
                <?php if($urlList[$index]!= "") {?>
                <td class="url-contents"><a href="<?= $urlList[$index] ?>" target="blank"><?= $favMlist->url ?></a></td>
                <?php }else{ ?>
                <td class="url-contents index-data">-</td>
                <?php } ?>
                <!-- <td><?= h($favMlist->image) ?></td> -->
                <td class="actions index-data">
                    <div><?= $this->Html->link(__('View'), ['action' => 'view', $favMlist->id]) ?></div>
                    <div><?= $this->Html->link(__('Edit'), ['action' => 'edit', $favMlist->id]) ?></div>
                    <div><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favMlist->id], ['confirm' => __('"{0}" を削除しますか？', $favMlist->title)]) ?></div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
