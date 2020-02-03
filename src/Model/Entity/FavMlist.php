<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FavMlist Entity
 *
 * @property int $id
 * @property string $title
 * @property string $player
 * @property string $genre
 * @property string|null $url
 * @property string|null $image
 */
class FavMlist extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'player' => true,
        'genre' => true,
        'url' => true,
        'image' => true,
    ];
}
