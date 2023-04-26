<!-- method 1 -->
<?php
$dir_path = '/path/to/directory';
if (is_dir($dir_path)) {
    $files = array_diff(scandir($dir_path), array('.', '..'));
    foreach ($files as $file) {
        unlink("$dir_path/$file");
    }
    rmdir($dir_path);
    echo "Directory deleted successfully.";
} else {
    echo "Directory does not exist.";
}
?>
<!-- method 2 -->
<?php
$dir_path = '/path/to/directory';
if (is_dir($dir_path)) {
    shell_exec("rm -r $dir_path");
    echo "Directory deleted successfully.";
} else {
    echo "Directory does not exist.";
}
?>