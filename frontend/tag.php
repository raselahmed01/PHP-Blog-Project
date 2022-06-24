
<div class="d-flex flex-wrap m-n1">
        <?php 
            include 'conn.php';

            $tag_select="select id,tag from article GROUP BY tag";

            $tag_qry=mysqli_query($conn,$tag_select);

            while ($tag_data=mysqli_fetch_assoc($tag_qry)) {
                ?>
        <a href="tag_blog.php?tag=<?php echo $tag_data['tag'];?>" class="btn btn-sm btn-outline-secondary m-1"><?php echo $tag_data['tag']?>
                
        </a>

        <?php
        }    

        ?>  
</div>
     


        