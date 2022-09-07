<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Skus Controller
 *
 * @property \App\Model\Table\SkusTable $Skus
 * @method \App\Model\Entity\Skus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SkusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types', 'Factories'],
        ];
        $skus = $this->paginate($this->Skus);

        $this->set(compact('skus'));
    }

    /**
     * View method
     *
     * @param string|null $id Skus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skus = $this->Skus->get($id, [
            'contain' => ['Types', 'Factories'],
        ]);

        $this->set(compact('skus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $skus = $this->Skus->newEmptyEntity();
        if ($this->request->is('post')) {
            $skus = $this->Skus->patchEntity($skus, $this->request->getData());
            if ($this->Skus->save($skus)) {
                $this->Flash->success(__('The skus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skus could not be saved. Please, try again.'));
        }
        $types = $this->Skus->Types->find('list', ['limit' => 200, 'conditions'=>['Types.archive' => false]])->all();
        $factories = $this->Skus->Factories->find('list', ['limit' => 200])->all();

        $this->loadModel('Factories');
        $factory= $this->Factories->get($id, [
            'contain' => ['Skus']
        ]);

        $this->set(compact('skus', 'types', 'factory', 'factories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Skus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skus = $this->Skus->get($id, [
            'contain' => ['Types','Factories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skus = $this->Skus->patchEntity($skus, $this->request->getData());
            if ($this->Skus->save($skus)) {
                $this->Flash->success(__('The skus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skus could not be saved. Please, try again.'));
        }
        $types = $this->Skus->Types->find('list', ['limit' => 200])->all();
        $factories = $this->Skus->Factories->find('list', ['limit' => 200])->all();

        $this->set(compact('skus', 'types', 'factories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Skus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skus = $this->Skus->get($id);
        if ($this->Skus->delete($skus)) {
            $this->Flash->success(__('The skus has been deleted.'));
        } else {
            $this->Flash->error(__('The skus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function update($id = null,$flag=null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
           $sku = $this->Skus->get($id);
           if($flag==0){
                $sku->archive=true;
                if ($this->Skus->save($sku)) {
                    $this->Flash->success(__('This sku has been archived.'));
                }else{
                    $this->Flash->error(__('This sku could not be archived. Please, try again.'));
                }
                return $this->redirect(['action' => 'index']);
           }elseif ($flag==1) {
            $sku->archive=false;
            if ($this->Skus->save($sku)) {
                $this->Flash->success(__('This sku has been unarchived.'));
            }else{
                $this->Flash->error(__('This sku could not be unarchived. Please, try again.'));
            }
            return $this->redirect(['action' => 'archive']);
           }
        }
    }

    public function archive()
    {
        $this->paginate = [
            'contain' => ['Types', 'Factories'],
        ];
        $skus = $this->paginate($this->Skus);

        $this->set(compact('skus'));
    }

    public function select()
    {
        $this->loadModel('Factories');
        $factories = $this->Skus->Factories->find('list', ['limit' => 200, 'conditions'=>['Factories.archive' => false]])->all();

        $factory=null ;
        if ($this->request->is('post')) {

            $factory =  $this->request->getData('id');

            // debug($factory);exit;
            return $this->redirect(['action' => 'add',$factory]);
        }
        $this->set(compact(  'factories','factory'));;
    }
}
