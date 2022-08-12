<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skus Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $type_id
 * @property int $factory_id
 *
 * @property \App\Model\Entity\Type $type
 */
class Skus extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'price' => true,
        'type_id' => true,
        'factory_id' => true,
        'type' => true,
    ];
}
