<?php
    require_once '../../autoload.api';
    
    if (isset($_POST['btn_save'])) {
        $post = bss_extract_add_data(['name_en', 'name_kh', 'video_path', 'category_id', 'keywords', 'description']);
        $thumbnail = bss_upload_image($_FILES['thumbnail'], $_POST['video_path']);        

        $req = "INSERT INTO movies (name_en, name_kh, video_path, category_id, keywords, description, thumbnail) 
                VALUES ('" . $post['name_en'] . "', '" . $post['name_kh'] . "', '" . $post['video_path'] . "', '" . $post['category_id'] . "', '" . $post['keywords'] . "', '" . $post["description"] . "', '" . $thumbnail . "')";
        if ($conn->query($req)) {
            echo '<script>
                alert("Successfull");
                window.location.replace("edit.php?id=' . $conn->insert_id . '");
            </script>';
        } else {
            echo $conn->errno;
        }
    }
?>
<?php bss_include_layout('header.layout'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Movie <small>Add information</small></h5>                
            </div>
            <div class="ibox-content">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group  row"><label class="col-sm-3 col-form-label">Name EN | Name KH</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6"><input type="text" name="name_en" class="form-control"placeholder="name english ..." value="<?php echo @$_POST['name_en'] ?>"></div>
                                        <div class="col-sm-6"><input type="text" name="name_kh" class="form-control" placeholder="name khmer ..." value="<?php echo @$_POST['name_kh'] ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  row"><label class="col-sm-3 col-form-label">Video Path | Category</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="video_path" class="form-control" placeholder="path or directory id ..." value="<?php echo @$_POST['video_path'] ?: (date('YmdHis') . rand(1111,9999)) ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <select name="category_id" class="form-control m-b" name="account" required>
                                                <option value="">====== category ======</option>
                                                <?php
                                                    foreach (get_catories() as $category) {
                                                        echo '<option ' . ($category['id'] == @$_POST['category_id'] ? 'selected' : '') . ' value="' . $category['id'] . '">' . $category['name_en'] . ' :: ' . $category['name_kh'] . '</option>';
                                                    }
                                                ?>        
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group  row"><label class="col-sm-3 col-form-label">Keywords</label>
                                <div class="col-sm-9">
                                    <input class="tagsinput form-control" type="text" name="keywords" value="<?php echo @$_POST['keywords'] ?>"/>
                                </div>
                            </div>
                            <div class="form-group  row"><label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" placeholder="description ..."><?php echo @$_POST['description'] ?></textarea>
                                </div>
                            </div>                
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Thumbnail</label>
                            <img src="<?php echo bss_asset('landing/shattered.png', 'img') ?>" class="form-control" alt="" id="img_preview">
                            <input type="file" name="thumbnail" class="form-control" id="file_preview">           
                        </div>
                    </div>                                
                    <div class="form-group">
                        <div class="text-center">
                            <br>
                            <br>
                            <br>
                            <a href="index.php" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit" name="btn_save"><i class="fa fa-save"></i> Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script>
    $(document).ready(function(){
        $('.tagsinput').tagsinput({
            tagClass: 'label label-primary'
        });
        
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#img_preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#file_preview").change(function() { readURL(this); });
    });
</script>

