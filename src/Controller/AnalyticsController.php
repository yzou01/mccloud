<?php
declare(strict_types=1);

namespace App\Controller;


class AnalyticsController extends AppController
{
    public function index()
    { $this->loadModel('Orders');
        $this->loadModel('Invoices');
        $this->paginate = [
            'contain' => ['Invoices', 'Skus'],
        ];
        $orders = $this->paginate($this->Orders);

        $label=array();
        
        foreach ($orders as $order) {
            if(array_key_exists($order->skus->name, $label)){
                
                $label[$order->skus->name]=$label[$order->skus->name]+ $order->quantity;
                
            }else{
                $label[$order->skus->name]=$order->quantity ;
               
            }
            
            
        }
        
        $this->set(compact('orders','label'));
    }
}
