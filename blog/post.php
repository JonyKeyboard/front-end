<?php
    include_once("templates/header.php");

    if(isset($_GET['id'])){
        $postId = $_GET['id'];
        $currentPost;

        foreach($posts as $post){

            if($post['id'] == $postId){
                $currentPost = $post;
            }
        }
    }

?>
    <main id="post-container">
        <div class="content-container">
            <h1 id="main-title"><?= $currentPost['title'] ?></h1>
            <p id="post-description"><?= $currentPost['description'] ?></p>
            <div class="img-container">
                <img src="<?= $BASE_URL ?>/img/<?= $currentPost['img'] ?>" alt="<?= $currentPost['title'] ?>">
            </div>
            <p class="post-content">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil eligendi ea ipsam sapiente dolorum ut accusamus quisquam porro modi repellendus praesentium, animi omnis illo. Ex ea temporibus rerum quasi dignissimos!
                Consequatur nobis excepturi asperiores provident illo eaque nesciunt voluptas veritatis dolore aliquid iste odio obcaecati quos itaque voluptate, impedit modi, qui repudiandae. Blanditiis vero neque cum fuga aut, eius sit?
                Architecto, dicta ad cupiditate aperiam libero at dignissimos iure, possimus ea totam ducimus recusandae fugit facere maiores temporibus illo numquam asperiores quia consequatur quos pariatur vitae quaerat suscipit voluptates. Cumque.
                Dolores earum, temporibus illum rem sint reiciendis aperiam aliquid quae eligendi expedita ducimus accusantium ipsam explicabo deleniti saepe magni repellendus deserunt, assumenda fugit quo cumque. Nulla dolorum iusto animi a.
                Sunt doloribus, doloremque voluptates explicabo numquam veniam fugit illo qui placeat dicta, eius blanditiis quam iste officia officiis? Itaque ipsum harum consectetur dicta rerum natus amet, officia vitae et placeat?
            </p>
            <p class="post-content">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil eligendi ea ipsam sapiente dolorum ut accusamus quisquam porro modi repellendus praesentium, animi omnis illo. Ex ea temporibus rerum quasi dignissimos!
                Consequatur nobis excepturi asperiores provident illo eaque nesciunt voluptas veritatis dolore aliquid iste odio obcaecati quos itaque voluptate, impedit modi, qui repudiandae. Blanditiis vero neque cum fuga aut, eius sit?
                Architecto, dicta ad cupiditate aperiam libero at dignissimos iure, possimus ea totam ducimus recusandae fugit facere maiores temporibus illo numquam asperiores quia consequatur quos pariatur vitae quaerat suscipit voluptates. Cumque.
                Dolores earum, temporibus illum rem sint reiciendis aperiam aliquid quae eligendi expedita ducimus accusantium ipsam explicabo deleniti saepe magni repellendus deserunt, assumenda fugit quo cumque. Nulla dolorum iusto animi a.
                Sunt doloribus, doloremque voluptates explicabo numquam veniam fugit illo qui placeat dicta, eius blanditiis quam iste officia officiis? Itaque ipsum harum consectetur dicta rerum natus amet, officia vitae et placeat?
            </p>
        </div>
        <aside id="nav-container">
        <h3 id="tags-title">Tags</h3>
        <ul class="tags-list">
            <?php foreach($currentPost['tags'] as $tag): ?>
                <li><a href="#"><?= $tag ?></a></li>
            <?php endforeach; ?>  
        </ul>
        <h3 id="categories-title">Categorias</h3>
        <ul id="categories-list">
            <?php foreach($categories as $category): ?>
                <li><a href="#"><?= $category ?></a></li>
            <?php endforeach; ?> 
        </ul>
    </aside>
    </main>
    
<?php
    include_once("templates/footer.php");
?>