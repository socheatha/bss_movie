<?php
    require_once 'autoload.api';
    $movie_id = $_GET['id'] ?? 1;
    $movie = get_movie_detail($movie_id);
    $_GET['category'] = $movie['movie']['cate_id'];

    $file_name = $_GET['playlist'] ?? $movie['playlist'][0] ?? 0;
?>

<?php bss_include_layout('header.layout', [], ['is_front_end' => 1,  'page_title' => 'Jeat Movie | ' . $movie['movie']['name_en']]); ?>
    <!-- cdnjs : use a specific version of Video.js (change the version numbers as necessary) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video-js.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
    <div class="row">
        <div class="col-md-9">
            <video
                id="my-player"
                class="video-js"
                controls
                preload="auto"
                data-setup='{"fluid": true}'
            >
                <source src="<?php echo bss_path('data/movie/' . $movie['movie']['video_path'] . '/' . $file_name) ?>" type="video/mp4">
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser
                </p>
            </video>
            <h1 class="main_title_detail"><?php echo $movie['movie']['name_en']; ?> | EP-<?php echo bss_remove_extension($file_name); ?></h1>
            <h2 class="main_sub_title_detail"><?php echo $movie['movie']['cate_name_en']; ?> | <?php echo $movie['movie']['cate_description']; ?></h2>
        </div>
        <div class="col-md-3" style="">
            <?php  bss_thumbnail($movie['movie']); ?>
        </div>
    </div>
    <?php if (sizeof($movie['playlist']) > 1) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><?php echo $movie['movie']['name_en']; ?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo bss_movie_playlist($movie['movie'], $movie['playlist'], $file_name); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php bss_include_layout('footer.layout'); ?>
<style>
    .jstree-open > .jstree-anchor > .fa-folder:before {
        content: "\f07c";
    }

    .jstree-default .jstree-icon.none {
        width: 0;
    }
</style>

<script>
    $(document).ready(function(){
        $('#jstree1').jstree({
            'core' : {
                'check_callback' : true
            },
            'plugins' : [ 'types', 'dnd' ],
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder'
                },
                'html' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'svg' : {
                    'icon' : 'fa fa-file-picture-o'
                },
                'css' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'img' : {
                    'icon' : 'fa fa-folder'
                },
                'js' : {
                    'icon' : 'fa fa-file-text-o'
                },
                'playing' : {
                    'icon' : 'fa fa-home'
                }
            }
        });
        $("#jstree1 li").on("click", "a", 
            function() {
                document.location.href = this;
            }
        );
    });
</script>
