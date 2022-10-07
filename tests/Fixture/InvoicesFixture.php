<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'number' => 'Lorem ip',
                'date' => '2022-10-07',
                'currency_of_origin' => 'Lorem ipsum dolor ',
                'currency_rate' => 1.5,
                'gst' => 'Lorem ipsum dolor sit amet',
                'factory_id' => 1,
                'discount' => 1.5,
                'archive' => 1,
                'total' => 1,
            ],
        ];
        parent::init();
    }
}
