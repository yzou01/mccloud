<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AddCosts Controller
 *
 * @property \App\Model\Table\AddCostsTable $AddCosts
 * @method \App\Model\Entity\AddCost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddCostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $addCosts = $this->paginate($this->AddCosts);

        $this->set(compact('addCosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Add Cost id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addCost = $this->AddCosts->get($id, [
            'contain' => ['Invoices'],
        ]);

        $this->set(compact('addCost'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addCost = $this->AddCosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $addCost = $this->AddCosts->patchEntity($addCost, $this->request->getData());
            if ($this->AddCosts->save($addCost)) {
                $this->Flash->success(__('The add cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The add cost could not be saved. Please, try again.'));
        }
        $this->set(compact('addCost'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Add Cost id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addCost = $this->AddCosts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addCost = $this->AddCosts->patchEntity($addCost, $this->request->getData());
            if ($this->AddCosts->save($addCost)) {
                $this->Flash->success(__('The add cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The add cost could not be saved. Please, try again.'));
        }
        $this->set(compact('addCost'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Add Cost id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addCost = $this->AddCosts->get($id);
        if ($this->AddCosts->delete($addCost)) {
            $this->Flash->success(__('The add cost has been deleted.'));
        } else {
            $this->Flash->error(__('The add cost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
