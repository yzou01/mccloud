<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesTable Test Case
 */
class TypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesTable
     */
    protected $Types;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Types',
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
        $config = $this->getTableLocator()->exists('Types') ? [] : ['className' => TypesTable::class];
        $this->Types = $this->getTableLocator()->get('Types', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Types);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
