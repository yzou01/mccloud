<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AddCost Entity
 *
 * @property int $id
 * @property int|null $duty
 * @property int|null $freight_sea
 * @property int|null $cartage
 * @property int|null $insurance
 * @property int|null $licence
 * @property int|null $agency
 * @property int|null $customs
 * @property int|null $TT_charge
 * @property int|null $miscellaneous
 *
 * @property \App\Model\Entity\Invoice[] $invoices
 */
class AddCost extends Entity
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
        'duty' => true,
        'freight_sea' => true,
        'cartage' => true,
        'insurance' => true,
        'licence' => true,
        'agency' => true,
        'customs' => true,
        'TT_charge' => true,
        'miscellaneous' => true,
        'invoices' => true,
    ];
}
