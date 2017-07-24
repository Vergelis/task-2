<p>Список всех страниц:</p>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li>        
            <a href='?controller=posts&action=show&id=<?= $post->id; ?>'><?= $post->title; ?></a>

            <p><?= $post->friendly; ?></p>
        </li>

    <?php endforeach; ?>
</ul>