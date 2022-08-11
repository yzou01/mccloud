<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkusFixture
 */
class SkusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'skus';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'type_id' => 1,
            ],
        ];
        parent::init();
    }
}
