<?php
class ProductsController extends AppController {

    public function index() {
        $this->set('products', $this->Product->find('all'));
    }

    public function view($id) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid Product'));
        }
        $this->set('product', $this->Product->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Product']['user_responsable'] = $this->Auth->user('id'); // Adicionada essa linha
            //echo '<pre>'; print_r($this->request->data);exit();
            if ($this->Product->save($this->request->data)) {
                $this->Flash->success('Your product has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
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

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Product->delete($id)) {
            $this->Flash->success('The product with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user) {
        return true;
        
    }

}