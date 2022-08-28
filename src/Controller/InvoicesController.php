<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [ 'Factories'],
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => [ 'Factories'],
        ]);

        $this->set(compact('invoice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoices->newEmptyEntity(['associated'=>['Additionalcosts','Orders']]);
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            //debug($this->request->getData()); exit;
            if ($this->Invoices->save($invoice)) {

                //debug($invoice); exit;
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //debug($invoice); exit;
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $this->loadModel('Skus');
        $skus=$this->Skus->find('list',['limit'=>200])->all();
        $factories = $this->Invoices->Factories->find('list', ['limit' => 200])->all();
        $additionalcosttypes = $this->Invoices->Additionalcosts->find('list')->toArray();
        //debug($additionalcosttypes); exit;
        $this->set(compact('invoice', 'factories', 'additionalcosttypes','skus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $invoice = $this->Invoices->get($id, [
            'contain' => ['Additionalcosts','Orders'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
//            debug($this->request->getData());
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
//            debug($invoice);
            if ($this->Invoices->save($invoice)) {
//                debug($this->request->getData('order_delete')); exit;
//                debug($orders_to_delete); exit;
                // delete any orders if given
                $orders_to_delete = $this->Invoices->Orders->find()->where(['id IN' => $this->request->getData('delete_orders')]);
                $this->Invoices->Orders->deleteMany($orders_to_delete);
                // delete any additionalcosts if given
                $additionalcosts_to_delte = $this->Invoices->Additionalcosts->find()->where(['id IN' => $this->request->getData('delete_additionalcosts')]);
                $this->Invoices->Additionalcosts->deleteMany($additionalcosts_to_delte);

                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $this->loadModel('Skus');
        $skus=$this->Skus->find('list',['limit'=>200])->all();
        $factories = $this->Invoices->Factories->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice',  'factories','skus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function update($id = null,$flag=null)
    {   
        if ($this->request->is(['patch', 'post', 'put'])) {
        $invoice = $this->Invoices->get($id);
        if($flag==0){
            $invoice->archive=true;
        }elseif($flag==1){
            $invoice->archive=false;
        }

        
        if ($this->Invoices->save($invoice)) {
            $this->Flash->success(__('The invoice has been archived.'));
        }else{
            $this->Flash->error(__('The invoice could not be archived. Please, try again.'));
        }
            
        
        
        
    }
        return $this->redirect(['action' => 'index']);
    }
    public function archive()
    {
        $this->paginate = [
            'contain' => [ 'Factories'],
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    
}
