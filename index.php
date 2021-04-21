<?php
    require_once 'autoload.api';
?>

<?php bss_include_layout('header.layout', [], ['is_front_end' => 1]); ?>
    <div class="row">
        <?php foreach (get_movies() as $movie) { ?>
            <div class="col-md-3"> <?php bss_thumbnail($movie); ?> </div>
        <?php } ?>
    </div>
<?php bss_include_layout('footer.layout'); ?>
