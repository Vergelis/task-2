<?php

class TestController {

    public function test() {
        if (!isset($_GET['id']))
            return call('pages', 'error');
        $test = Post::find($_GET['id']);

      
        echo 'Результат теста: '.$test['message'];
    }

}

?>