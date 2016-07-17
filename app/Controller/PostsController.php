<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {
  public $name = 'Posts';
  public $uses = array('Post');

  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('posts', $this->Post->find('all'));
  }

  public function view($id = null) {
    $this->Post->id = $id;
    $this->set('post', $this->Post->findById($id));
  }

  public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->Save($this->request->data)) {
                $this->Session->setFlash('保存に成功しました!!!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('保存に失敗しました...');
            }
        }
    }

  public function edit($id = null){
    $this->Post->id = $id;
    $post = $this->Post->findById($id);

    if($this->request->is('get')){
      $this->request->data = $post;
    }

    if($this->request->is(array('post', 'put'))){
      if($this->Post->save($this->request->data)){
        $this->Session->setFlash('更新しました!!!');
        $this->redirect(array('action' => 'view',$post['Post']['id']));
      }else{
        $this->Session->setFlash('保存に失敗しました…');
      }
    }
  }

  public function delete($id = null){
    if($this->request->is('get')){
      throw new MethodNotAllowedException();
    }

    if($this->Post->delete($id)){
      $this->Session->setFlash('記事を削除しました');
    }else{
      $this->Session->setFlash('エラーが発生しました');
    }
    $this->redirect(array('action' => 'index'));
  }

}
