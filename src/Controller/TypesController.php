<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $types = $this->paginate($this->Types);

        $this->set(compact('types'));
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Skus'],
        ]);

        $this->set(compact('type'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEmptyEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $this->set(compact('type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function update($id = null,$flag=null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->get($id);
            if ($flag == 0) {
                $type->archive = true;
                if ($this->Types->save($type)) {
                    $this->Flash->success(__('This type has been archived.'));
                } else {
                    $this->Flash->error(__('This type could not be archived. Please, try again.'));
                }
                return $this->redirect(['action' => 'index']);
            } elseif ($flag == 1) {
                $type->archive = false;
                if ($this->Types->save($type)) {
                    $this->Flash->success(__('This type has been unarchived.'));
                } else {
                    $this->Flash->error(__('This Type could not be unarchived. Please, try again.'));
                }
                return $this->redirect(['action' => 'archive']);
            }
        }
    }

    public function archive()
    {
        $this->paginate = [
            'contain' => [ 'type'],
        ];
        $type = $this->paginate($this->Types);

        $this->set(compact('type'));
    }
}
