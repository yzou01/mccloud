<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkusTable Test Case
 */
class SkusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SkusTable
     */
    protected $Skus;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Skus',
        'app.Types',
        'app.Factories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Skus') ? [] : ['className' => SkusTable::class];
        $this->Skus = $this->getTableLocator()->get('Skus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Skus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SkusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SkusTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
