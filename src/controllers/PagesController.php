<?php

namespace Homer\CitasMvc\Controllers;

use Homer\CitasMvc\Lib\Controller;
use Homer\CitasMvc\Models\Post;

class PagesController extends Controller {
  public function home() {
    $postModel = new Post;

    $posts = $postModel->getAll();

    $this->render('home', compact('posts'));
  }

  public function post($slug) {
    $postModel = new Post;

    $post = $postModel->findBySlug($slug);

    $this->render('posts/show', compact('post'));
  }
  
  public function error_404() {
    $this->render('errors/404');
  }
}