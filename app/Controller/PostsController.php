<?php

class PostsController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $name = 'Posts';

    function index()
    {
        $this->set('posts', $this->Post->find('all'));
        $this->set('role', $this->Auth->user('role'));
        if (empty($this->Auth->user('id'))) {
            $this->set('user_id', '12');
        } else {
            $this->set('user_id', $this->Auth->user('id'));
        }
    }

    public function view($id = null)
    {
        $this->set('post', $this->Post->findById($id));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); // Adicionada essa linha
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id)
    {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->findById($id);
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user)
    {
        if (parent::isAuthorized($user)) {
            return true;
        }
        if ($this->action === 'add') {
            return true;
        }
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            $post = $this->Post->findById($postId)['Post'];

            return $post['user_id'] == $user['id'];
        }
    }
}
