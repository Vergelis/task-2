<?php

class Post {

    // определяем атрибуты страницы
    public $id;
    public $friendly;
    public $title;
    public $description;

    public function __construct($id, $friendly, $title, $description) {
        $this->id = $id;
        $this->friendly = $friendly;
        $this->title = $title;
        $this->description = $description;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['friendly'], $post['title'], $post['description']);
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));

        $result = array();
        if ($req->rowCount() == 0) {
            $result['success'] = FALSE;
            $result['message'] = 'Такая страница не найдена. ID: ' . $id;
            $result['result'] = false;
        } else {
            $post = $req->fetch();
            $result['success'] = TRUE;
            $result['message'] = 'Id: ' . $id . '; Title: ' . $post['title'];
            $result['result'] = new Post($post['id'], $post['friendly'], $post['title'], $post['description']);
        }
        return $result;
    }

}

?>