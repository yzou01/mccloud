<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>'passwords']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>'passwords']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','password']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'display',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function password(){

        if($this->request->is('post'))
        {
            $user_data = $this->request->data;
            if(!empty($user_data)){
                $this->User->recursive=-1;
                $check_email = $this->User->find('first',array('conditions'=>array('User.email_address'=>$user_data['User']['email_address'])));

                if(!empty($check_email)){
                    $data['id'] = $check_email['User']['id'];
                    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $new_password = '';
                    for ($i=0; $i<6; $i++)
                    {
                        $new_password .= $characters[rand(0, strlen($characters) - 1)];
                    }

                    $data['password'] = md5($new_password);
                    $this->User->save($data);
                    /* Sending Email to user */
                    $email=$user_data['User']['email_address'];
                    $message = '';
                    $message .= '<html>';
                    $message.='<table style="width:800px;margin:auto;border-collapse:collapse;border:1px solid #5A5A5A;">';
                    $message.='<thead style="background:#5A5A5A;">';
                    $message.='<tr>';
                    $message.='<td width="50%" style="padding:14px 20px;text-align:right;font-size:25px;color:#fff;"></td>';
                    $message.='</tr>';
                    $message.='</thead>';
                    $message.='<tbody>';
                    $message.='<tr>';
                    $message.='<td style="padding:5px 20px;" colspan="2">';
                    $message .= "<h3>New Password  :".$new_password."</h3></br>";


                    $message .= '<br/><br/>Best Regards';
                    $message .= '<br/><br/> My Team';
                    $message.='</td>';
                    $message.='</tr>';
                    $message.='</tbody>';
                    $message.='</table>';
                    $message .= '<html>';
                    $data_send['body'] = $message;
                    $data_send['subject'] = "Forgot Password - My Team";

                    $data_send['to'] = $email;
                    //echo "<pre>";print_r($data_send);die;
                    // echo "<pre>";print_r($data_send);die;

                    $output = $this->send_mail($data_send);

                    /* Sending Email to user */
                    if($output){
                        $this->Session->setFlash('Password has been changed, Check Your Mail', 'default', array('class' => 'example_class'));
                        $this->redirect(array('controller' => 'users', 'action' => 'login'));
                        //echo json_encode(array('status' => 'success', 'message' => "Password has been changed , please check your email")); die;
                    }
                    else{
                        $this->Session->setFlash('Password has been changed ', 'default', array('class' => 'example_class'));
                        $this->redirect(array('controller' => 'users', 'action' => 'registration'));
                    }
                }
                else{
                    $this->Session->setFlash('Email Not Exist', 'default', array('class' => 'example_class'));
                    $this->redirect(array('controller' => 'users', 'action' => 'registration'));
                }
            }
        }
    }
}
