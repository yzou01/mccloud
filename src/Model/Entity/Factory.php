<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factory Entity
 *
 * @property int $id
 * @property string $name
 * @property string $currency
 * @property bool $archive
 *
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Skus[] $skus
 */
class Factory extends Entity
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
        'currency' => true,
        'archive' => true,
        'invoices' => true,
        'skus' => true,
    ];
}
