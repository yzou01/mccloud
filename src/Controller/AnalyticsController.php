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

    public function expenses(){
        $this->loadModel('Invoices');
        $this->paginate = [
            'contain' => ['Factories'],
        ];
        $invoices = $this->paginate($this->Invoices);
        $spending=array();
        foreach($invoices as $invoice) {
            if(array_key_exists($invoice->factory->name, $spending)){
                $spending[$invoice->factory->name]=$spending[$invoice->factory->name]+$invoice->total;
            } else {
                $spending[$invoice->factory->name]=$invoice->total;
            }
        }

        $this->loadModel('Additionalcosts');
        $this->paginate = [
            'contain' => [],
        ];
        $addCosts = $this->paginate($this->Additionalcosts);
        $addCostData=array();
        foreach ($addCosts as $addCost) {
            if(array_key_exists($addCost->name, $addCostData)){
                $addCostData[$addCost->name]=$addCostData[$addCost->name]+ $addCost->amount;
            }else{
                $addCostData[$addCost->name]=$addCost->amount;
            }
        }
        $this->set(compact('spending', 'addCostData'));
    }

    public function distribution(){
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
        $label=array();
        foreach ($orders as $order) {
            if(array_key_exists($order->skus->name, $label)){
                $label[$order->skus->name]=$label[$order->skus->name]+ $order->quantity;
            }else{
                $label[$order->skus->name]=$order->quantity ;
            }
        }

        $this->loadModel('Types');
        $this->paginate = [
            'contain' => ['Skus'],
        ];
        $typesData=array();
        foreach ($orders as $type) {
            if(array_key_exists($type->skus->type_id, $typesData)){
                $typesData[$type->skus->type_id]=$typesData[$type->skus->type_id]+ $type->quantity;
            } else {
                $typesData[$type->skus->type_id]=$type->quantity;
            }
        }
        $this->set(compact('orders','label', 'typesData'));
    }
}
