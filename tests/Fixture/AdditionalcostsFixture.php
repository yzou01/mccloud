<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdditionalcostsFixture
 */
class AdditionalcostsFixture extends TestFixture
{
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
                'amount' => 1,
                'invoice_id' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
