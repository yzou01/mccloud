<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddcostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddcostsTable Test Case
 */
class AddcostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddcostsTable
     */
    protected $Addcosts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Addcosts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Addcosts') ? [] : ['className' => AddcostsTable::class];
        $this->Addcosts = $this->getTableLocator()->get('Addcosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Addcosts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AddcostsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
