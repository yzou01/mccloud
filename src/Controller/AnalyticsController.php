<?php
declare(strict_types=1);

namespace App\Controller;


class AnalyticsController extends AppController
{
    public function index()
    {
        $this->loadModel('Orders');
        $this->loadModel('Invoices');
        $this->loadModel('Factories');
        $this->paginate = [
            'contain' => ['Invoices', 'Skus'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->paginate = [
            'contain' => ['Factories'],
        ];

        $invoices = $this->paginate($this->Invoices);


        $label=array();

        foreach ($orders as $order) {
            if(array_key_exists($order->skus->name, $label)){
                $label[$order->skus->name]=$label[$order->skus->name]+ $order->quantity;
            }else{
                $label[$order->skus->name]=$order->quantity ;
            }
        }

        $spending=array();

        foreach($invoices as $invoice) {
            if(array_key_exists($invoice->factory->name, $spending)){
                $spending[$invoice->factory->name]=$spending[$invoice->factory->name]+$invoice->total;
            } else {
                $spending[$invoice->factory->name]=$invoice->total;
            }
        }

        $this->set(compact('orders','label', 'invoices', 'spending'));
    }
}
