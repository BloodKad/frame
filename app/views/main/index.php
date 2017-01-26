<?php
echo 'INDEX VIEW';
?>
<div class="container">
    <?php 
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                // echo $post['name'];
            }
        }
    ?>
</div>
