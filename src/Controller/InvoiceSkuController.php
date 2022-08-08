<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InvoiceSku Controller
 *
 * @property \App\Model\Table\InvoiceSkuTable $InvoiceSku
 * @method \App\Model\Entity\InvoiceSku[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceSkuController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Invoices', 'Skus'],
        ];
        $invoiceSku = $this->paginate($this->InvoiceSku);

        $this->set(compact('invoiceSku'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Sku id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceSku = $this->InvoiceSku->get($id, [
            'contain' => ['Invoices', 'Skus'],
        ]);

        $this->set(compact('invoiceSku'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceSku = $this->InvoiceSku->newEmptyEntity();
        if ($this->request->is('post')) {
            $invoiceSku = $this->InvoiceSku->patchEntity($invoiceSku, $this->request->getData());
            if ($this->InvoiceSku->save($invoiceSku)) {
                $this->Flash->success(__('The invoice sku has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice sku could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoiceSku->Invoices->find('list', ['limit' => 200])->all();
        $skus = $this->InvoiceSku->Skus->find('list', ['limit' => 200])->all();
        $this->set(compact('invoiceSku', 'invoices', 'skus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Sku id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceSku = $this->InvoiceSku->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceSku = $this->InvoiceSku->patchEntity($invoiceSku, $this->request->getData());
            if ($this->InvoiceSku->save($invoiceSku)) {
                $this->Flash->success(__('The invoice sku has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice sku could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoiceSku->Invoices->find('list', ['limit' => 200])->all();
        $skus = $this->InvoiceSku->Skus->find('list', ['limit' => 200])->all();
        $this->set(compact('invoiceSku', 'invoices', 'skus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Sku id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceSku = $this->InvoiceSku->get($id);
        if ($this->InvoiceSku->delete($invoiceSku)) {
            $this->Flash->success(__('The invoice sku has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice sku could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
