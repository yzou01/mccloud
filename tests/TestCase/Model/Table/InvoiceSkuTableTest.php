<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceSkuTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceSkuTable Test Case
 */
class InvoiceSkuTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoiceSkuTable
     */
    protected $InvoiceSku;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InvoiceSku',
        'app.Invoices',
        'app.Skus',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InvoiceSku') ? [] : ['className' => InvoiceSkuTable::class];
        $this->InvoiceSku = $this->getTableLocator()->get('InvoiceSku', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InvoiceSku);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InvoiceSkuTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InvoiceSkuTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
