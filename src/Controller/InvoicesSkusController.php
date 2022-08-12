<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InvoicesSkus Controller
 *
 * @property \App\Model\Table\InvoicesSkusTable $InvoicesSkus
 * @method \App\Model\Entity\InvoicesSkus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesSkusController extends AppController
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
        $invoicesSkus = $this->paginate($this->InvoicesSkus);

        $this->set(compact('invoicesSkus'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoices Skus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoicesSkus = $this->InvoicesSkus->get($id, [
            'contain' => ['Invoices', 'Skus'],
        ]);

        $this->set(compact('invoicesSkus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoicesSkus = $this->InvoicesSkus->newEmptyEntity();
        if ($this->request->is('post')) {
            $invoicesSkus = $this->InvoicesSkus->patchEntity($invoicesSkus, $this->request->getData());
            if ($this->InvoicesSkus->save($invoicesSkus)) {
                $this->Flash->success(__('The invoices skus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoices skus could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoicesSkus->Invoices->find('list', ['limit' => 200])->all();
        $skus = $this->InvoicesSkus->Skus->find('list', ['limit' => 200])->all();
        $this->set(compact('invoicesSkus', 'invoices', 'skus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoices Skus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoicesSkus = $this->InvoicesSkus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoicesSkus = $this->InvoicesSkus->patchEntity($invoicesSkus, $this->request->getData());
            if ($this->InvoicesSkus->save($invoicesSkus)) {
                $this->Flash->success(__('The invoices skus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoices skus could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoicesSkus->Invoices->find('list', ['limit' => 200])->all();
        $skus = $this->InvoicesSkus->Skus->find('list', ['limit' => 200])->all();
        $this->set(compact('invoicesSkus', 'invoices', 'skus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoices Skus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoicesSkus = $this->InvoicesSkus->get($id);
        if ($this->InvoicesSkus->delete($invoicesSkus)) {
            $this->Flash->success(__('The invoices skus has been deleted.'));
        } else {
            $this->Flash->error(__('The invoices skus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
