<?php
class ProductsController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $name = 'Products';
    public function index()
    {
        $this->set('products', $this->Product->find('all'));
        $this->set('role', $this->Auth->user('role'));
    }

    public function view($id)
    {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid Product'));
        }
        $this->set('product', $this->Product->findById($id));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Product']['user_responsable'] = $this->Auth->user('id'); // Adicionada essa linha
            if ($this->request->data['Product']['quantity'] > 0 && $this->request->data['Product']['price'] > 0) {
                if ($this->Product->save($this->request->data)) {
                    $this->Flash->success('Your product has been saved.');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Flash->error(__('Invalid values'));
            }
        }
    }
    public function edit($id = null)
    {

        $this->Product->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Product->findById($id);
        } else {
            if ($this->Product->save($this->request->data)) {
                $this->Flash->success('Your product has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Product->delete($id)) {
            $this->Flash->success('The product with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user)
    {
        if (parent::isAuthorized($user)) {
            return true;
        }

        if (in_array($this->action, array('edit', 'delete')) && $user['role'] == 'author') {
            return false;
        }
        if ($user['role'] == 'employee' && in_array($this->action, array('edit', 'delete'))) {
            $productId = (int) $this->request->params['pass'][0];
            $product = $this->Product->findById($productId)['Product'];
            return $product['user_responsable'] == $user['id'];
        }
        if ($user['role'] == 'client' && in_array($this->action, array('index', 'view'))) {
            return true;
        }
        if ($this->action == 'add' && $user['role'] == 'employee') {
            return true;
        }
    }
}
