<?php
    require_once 'autoload.api';
?>

<?php bss_include_layout('header.layout', [], ['is_front_end' => 1]); ?>
    <div class="row">
        <?php if (isset($_GET['category'])) {
            foreach (get_movie_list($_GET['category']) as $movie) {
                ?><div class="col-md-3"> <?php bss_thumbnail($movie); ?> </div><?php
            }
        } elseif (isset($_SESSION['bss_categories'])) {
            foreach ($_SESSION['bss_categories'] as $category) {
                $movie_list = get_movie_list($category['id'], 8);
                $category['color'] = $category['color'] ?: '#1ab394';
                if (sizeof($movie_list)) {
                    ?><div class="col-md-12"><h2 class="product-price" style="position: static; background-color: <?php echo $category['color']; ?>"><?php echo $category['name_en'] ?></h2></div><?php
                    foreach ($movie_list as $movie) {
                        ?><div class="col-md-3"> <?php bss_thumbnail($movie); ?> </div><?php
                    }
                    ?><div class="col-md-12 text-center"><a  href="index.php?category=<?php echo $category['id']; ?>" style="color: <?php echo $category['color']; ?>"><strong> =========>>>> See More <<<<========= </strong></a><br/><br/><br/><br/></div><?php
                }
            }
        } ?>
    </div>
<?php bss_include_layout('footer.layout'); ?>
