<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddCostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddCostsTable Test Case
 */
class AddCostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddCostsTable
     */
    protected $AddCosts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AddCosts',
        'app.Invoices',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AddCosts') ? [] : ['className' => AddCostsTable::class];
        $this->AddCosts = $this->getTableLocator()->get('AddCosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AddCosts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AddCostsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
