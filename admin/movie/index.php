<?php
    require_once '../../autoload.api';
?>
<style>
    .dataTables-example * {
        white-space: nowrap;
        font-size: 12px;
    }
</style>
<?php bss_include_layout('header.layout'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5><a href="add.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Movie</a> Basic Data Tables example with responsive plugin</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <?php
                        $table_header = '
                            <tr class="text-center">
                            <th>N<sup>0</sup></th>
                            <th>Thumbnail</th>
                            <th>Name EN / Name KH</th>
                            <th>Video ID</th>
                            <th>View</th> <th>EP</th> 
                            <th>Category</th>
                            <th>Date</th>
                            <th>Keyword</th>
                            <th>Description</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                        ';
                    ?>

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead><?php echo $table_header; ?></thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach (get_movie_list($_GET['category'] ?? null) as $movie) { 
                                    echo '<tr class="gradeX">
                                        <td class="text-center">' . ++ $i  . '</td>
                                        <td class="text-center">
                                            <a href="' . (bss_is_cdn($movie['thumbnail']) ? $movie['thumbnail'] : bss_path('data/movie/' . $movie['video_path'] . '/' . $movie['thumbnail'])) . '" title="Image from Unsplash" data-gallery=""><i class="fa fa-image fa-2x"></i></a>
                                        </td>
                                        <td><a href="' . bss_path('detail.php?id=' . $movie['id']) . '" target="_blank">' . $movie["name_en"] . '<br/>' . $movie["name_kh"] . '</a></td>
                                        <td>' .$movie["video_path"] . '</td>
                                        <th class="text-center">' .bss_count_K($movie["view_count"]) .'</th>
                                        <th class="text-center">' .bss_count_K($movie["ep_count"]) .'</th>
                                        <td>' . $movie["cate_name_en"] . '<br/>' . $movie["cate_name_kh"] . '</td>                                      </td>
                                        <td>' .bss_standard_date($movie["created_at"]) .'</td>
                                        <td>'. $movie["keywords"] . '</td>
                                        <td class="center">'. $movie["description"] . '</td>
                                        <td class="center"><i>Socheatha Tey</i></td>                
                                        <td class="center">
                                            <a href="edit.php?id=' . $movie["id"] . '" class="btn btn-xs btn-warning">Edit</a>
                                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                        <tfoot><?php $table_header; ?></tfoot>
                    </table>
                </div>                             
            </div>
        </div>
    </div>
</div>
<?php bss_include_layout('footer.layout'); ?>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]
        });
    });
</script>

