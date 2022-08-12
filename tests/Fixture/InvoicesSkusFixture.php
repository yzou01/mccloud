<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesSkusFixture
 */
class InvoicesSkusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'invoices_skus';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'invoice_id' => 1,
                'sku_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
