<?php 
    $sqlMenu = "SELECT * FROM category ORDER BY cat_id";
    $queryMenu = mysqli_query($conn, $sqlMenu);

?>
<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php if(mysqli_num_rows($queryMenu)) {
                while ($menu = mysqli_fetch_assoc($queryMenu)) {
            ?> 
                <li class="menu-item">
                    <a href="index.php?page_layout=category&cat_id=<?php echo $menu['cat_id']; ?>">
                        <?php echo $menu['cat_name']; ?>
                    </a>
                </li>
            <?php   
                }
            }
            ?>
            
        </ul>
    </div>
</nav>