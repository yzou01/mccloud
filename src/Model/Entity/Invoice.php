<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property string $number
 * @property \Cake\I18n\FrozenDate $date
 * @property string $currency_of_origin
 * @property float $currency_rate
 * @property int $add_cost_id
 *
 * @property \App\Model\Entity\Addcost $add_cost
 * @property \App\Model\Entity\InvoiceSku[] $invoice_sku
 */
class Invoice extends Entity
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
        'number' => true,
        'date' => true,
        'currency_of_origin' => true,
        'currency_rate' => true,
        'add_cost_id' => true,
        'add_cost' => true,
        'invoice_sku' => true,
    ];
}
