<!-- method 1 -->
<?php
function rmdir_recursive($dir) {
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        is_dir("$dir/$file") ? rmdir_recursive("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}
?>
<!-- method 2 -->
<?php
$dir_path = 'C:/path/to/directory';
if (is_dir($dir_path)) {
    rmdir_recursive($dir_path);
    echo "Directory deleted successfully.";
} else {
    echo "Directory does not exist.";
}
?>