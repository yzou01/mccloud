<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesSkusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesSkusTable Test Case
 */
class InvoicesSkusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoicesSkusTable
     */
    protected $InvoicesSkus;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InvoicesSkus',
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
        $config = $this->getTableLocator()->exists('InvoicesSkus') ? [] : ['className' => InvoicesSkusTable::class];
        $this->InvoicesSkus = $this->getTableLocator()->get('InvoicesSkus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InvoicesSkus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InvoicesSkusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InvoicesSkusTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
