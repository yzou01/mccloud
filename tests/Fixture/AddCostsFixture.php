<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddcostsFixture
 */
class AddcostsFixture extends TestFixture
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
                'duty' => 1,
                'freight_sea' => 1,
                'cartage' => 1,
                'insurance' => 1,
                'licence' => 1,
                'agency' => 1,
                'customs' => 1,
                'TT_charge' => 1,
                'miscellaneous' => 1,
            ],
        ];
        parent::init();
    }
}
