<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Additionalcost Entity
 *
 * @property int $id
 * @property string $name
 * @property float $amount
 * @property int $invoice_id
 * @property int|null $comment
 *
 * @property \App\Model\Entity\Invoice $invoice
 */
class Additionalcost extends Entity
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
        'amount' => true,
        'invoice_id' => true,
        'comment' => true,
        'invoice' => true,
    ];
}
