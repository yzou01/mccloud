<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoicesSkus Entity
 *
 * @property int $invoice_id
 * @property int $sku_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Skus $skus
 */
class InvoicesSkus extends Entity
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
        'quantity' => true,
        'invoice' => true,
        'skus' => true,
    ];
}