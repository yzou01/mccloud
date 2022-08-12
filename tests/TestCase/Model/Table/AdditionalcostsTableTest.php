<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdditionalcostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdditionalcostsTable Test Case
 */
class AdditionalcostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdditionalcostsTable
     */
    protected $Additionalcosts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Additionalcosts',
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
        $config = $this->getTableLocator()->exists('Additionalcosts') ? [] : ['className' => AdditionalcostsTable::class];
        $this->Additionalcosts = $this->getTableLocator()->get('Additionalcosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Additionalcosts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdditionalcostsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdditionalcostsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
