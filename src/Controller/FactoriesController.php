<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Factories Controller
 *
 * @property \App\Model\Table\FactoriesTable $Factories
 * @method \App\Model\Entity\Factory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FactoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $factories = $this->paginate($this->Factories);

        $this->set(compact('factories'));
    }

    /**
     * View method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factory = $this->Factories->get($id, [
            'contain' => ['Invoices', 'Skus'],
        ]);

        $this->set(compact('factory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factory = $this->Factories->newEmptyEntity();
        if ($this->request->is('post')) {
            $factory = $this->Factories->patchEntity($factory, $this->request->getData());
            if ($this->Factories->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $this->set(compact('factory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factory = $this->Factories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factory = $this->Factories->patchEntity($factory, $this->request->getData());
            if ($this->Factories->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $this->set(compact('factory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factory = $this->Factories->get($id);
        if ($this->Factories->delete($factory)) {
            $this->Flash->success(__('The factory has been deleted.'));
        } else {
            $this->Flash->error(__('The factory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function update($id = null,$flag=null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factory = $this->Factories->get($id);
            if($flag==0){
                $factory->archive=true;
                if ($this->Factories->save($factory)) {
                    $this->Flash->success(__('This factory has been archived.'));
                }else{
                    $this->Flash->error(__('This factory could not be archived. Please, try again.'));
                }
                return $this->redirect(['action' => 'index']);
            }elseif ($flag==1) {
                $factory->archive=false;
                if ($this->Factories->save($factory)) {
                    $this->Flash->success(__('This factory has been unarchived.'));
                }else{
                    $this->Flash->error(__('This factory could not be unarchived. Please, try again.'));
                }
                return $this->redirect(['action' => 'archive']);
            }
        }
    }

    public function archive()
    {
        $factories = $this->paginate($this->Factories);

        $this->set(compact('factories'));
    }

}
