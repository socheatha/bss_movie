<?php
    require_once '../../autoload.api';
?>

<?php bss_include_layout('header.layout'); ?>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../../lib/elFinder-2.1/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="../../lib/elFinder-2.1/css/theme.css">
    <div id="elfinder"></div>
    <script type="text/javascript" charset="utf-8">
        var endLoadjs = function(){
            $('#elfinder').elfinder(
                // 1st Arg - options
                {
                    height: 950,
                    cssAutoLoad : false,               // Disable CSS auto loading
                    baseUrl : './',                    // Base URL to css/*, js/*
                    url : '../../lib/elFinder-2.1/php/connector.minimal.php'  // connector URL (REQUIRED)
                    // , lang: 'ru'                    // language (OPTIONAL)
                    
                    // 'DOM Element ID': { /* elFinder options of this DOM Element */ }
                    
                       
        
                },
                // 2nd Arg - before boot up function
                function(fm, extraObj) {
                    // `init` event callback function
                    fm.bind('init', function() {
                        // Optional for Japanese decoder "encoding-japanese.js"
                        if (fm.lang === 'ja') {
                            fm.loadScript(
                                [ '//cdn.rawgit.com/polygonplanet/encoding.js/1.0.26/encoding.min.js' ],
                                function() {
                                    if (window.Encoding && Encoding.convert) {
                                        fm.registRawStringDecoder(function(s) {
                                            return Encoding.convert(s, {to:'UNICODE',type:'string'});
                                        });
                                    }
                                },
                                { loadType: 'tag' }
                            );
                        }
                    });
                    // Optional for set document.title dynamically.
                    var title = document.title;
                    fm.bind('open', function() {
                        var path = '',
                            cwd  = fm.cwd();
                        if (cwd) {
                            path = fm.path(cwd.hash) || null;
                        }
                        document.title = path? path + ':' + title : title;
                    }).bind('destroy', function() {
                        document.title = title;
                    });
                }
            );
        }
    </script>
<?php bss_include_layout('footer.layout'); ?>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="../../lib/elFinder-2.1/js/elfinder.min.js"></script>
        <script src="../../lib/elFinder-2.1/js/extras/editors.default.min.js"></script>
