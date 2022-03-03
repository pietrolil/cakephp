<?php

class OrdersController extends AppController
{

    public function index()
    {
        $this->set('orders', $this->Order->find('all'));
    }

    public function view($id)
    {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid Order'));
        }
        $this->set('order', $this->Order->findById($id));
    }

    public function add($data)
    {
        $data = explode(',',$data);
        if ($this->request->is('post')) {
            if ($data[1] >= $this->request->data['Order']['quantity']) {
                $this->request->data['Order']['user_id'] = $this->Auth->user('id'); // Adicionada essa linha
                $this->request->data['Order']['product_id'] = $data[0]; // Adicionada essa linha
                $this->request->data['Order']['status'] = 'approving';
                if ($this->Order->save($this->request->data)) {
                    $this->request->data = $this->Order->Product->findById($data[0]);
                    $this->request->data['Product']['quantity'] =  intval($this->request->data['Product']['quantity']) - 2 ;
                    $this->Order->Product->save($this->request->data);
                    $this->Flash->success('Your Order has been saved.');
                    $this->redirect(array('controller' => 'products', 'action' => 'index'));
                }
            }
            $this->Flash->error(__('Invalid quantity.'));
        }
    }

    public function edit($id = null)
    {

        $this->Order->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Order->findById($id);
        } else {
            if ($this->Order->save($this->request->data)) {
                $this->Flash->success('Your order has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Order->delete($id)) {
            $this->Flash->success('The Order with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user)
    {
        return true;
    }
}
