<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Additionalcosts Controller
 *
 * @property \App\Model\Table\AdditionalcostsTable $Additionalcosts
 * @method \App\Model\Entity\Additionalcost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdditionalcostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Invoices'],
        ];
        $additionalcosts = $this->paginate($this->Additionalcosts);

        $this->set(compact('additionalcosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Additionalcost id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $additionalcost = $this->Additionalcosts->get($id, [
            'contain' => ['Invoices'],
        ]);

        $this->set(compact('additionalcost'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $additionalcost = $this->Additionalcosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $additionalcost = $this->Additionalcosts->patchEntity($additionalcost, $this->request->getData());
            if ($this->Additionalcosts->save($additionalcost)) {
                $this->Flash->success(__('The additionalcost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The additionalcost could not be saved. Please, try again.'));
        }
        $invoices = $this->Additionalcosts->Invoices->find('list', ['limit' => 200])->all();
        $this->set(compact('additionalcost', 'invoices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Additionalcost id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $additionalcost = $this->Additionalcosts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $additionalcost = $this->Additionalcosts->patchEntity($additionalcost, $this->request->getData());
            if ($this->Additionalcosts->save($additionalcost)) {
                $this->Flash->success(__('The additionalcost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The additionalcost could not be saved. Please, try again.'));
        }
        $invoices = $this->Additionalcosts->Invoices->find('list', ['limit' => 200])->all();
        $this->set(compact('additionalcost', 'invoices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Additionalcost id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $additionalcost = $this->Additionalcosts->get($id);
        if ($this->Additionalcosts->delete($additionalcost)) {
            $this->Flash->success(__('The additionalcost has been deleted.'));
        } else {
            $this->Flash->error(__('The additionalcost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
