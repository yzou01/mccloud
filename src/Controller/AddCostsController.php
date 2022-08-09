<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Addcosts Controller
 *
 * @property \App\Model\Table\AddcostsTable $Addcosts
 * @method \App\Model\Entity\Addcost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddcostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $addcosts = $this->paginate($this->Addcosts);

        $this->set(compact('addcosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Addcost id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addcost = $this->Addcosts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('addcost'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addcost = $this->Addcosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $addcost = $this->Addcosts->patchEntity($addcost, $this->request->getData());
            if ($this->Addcosts->save($addcost)) {
                $this->Flash->success(__('The addcost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The addcost could not be saved. Please, try again.'));
        }
        $this->set(compact('addcost'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Addcost id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addcost = $this->Addcosts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addcost = $this->Addcosts->patchEntity($addcost, $this->request->getData());
            if ($this->Addcosts->save($addcost)) {
                $this->Flash->success(__('The addcost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The addcost could not be saved. Please, try again.'));
        }
        $this->set(compact('addcost'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Addcost id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addcost = $this->Addcosts->get($id);
        if ($this->Addcosts->delete($addcost)) {
            $this->Flash->success(__('The addcost has been deleted.'));
        } else {
            $this->Flash->error(__('The addcost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
