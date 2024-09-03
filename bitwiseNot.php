<?php
function bitwiseNot($filePath) {
    $arr = file_get_contents($filePath);
    if ($arr === false) {
        return false;
    }
    $arr = array_map('ord', str_split($arr));
    foreach ($arr as &$byte) {
        $byte = ~$byte & 0xFF;
    }
    $arr = array_map('chr', $arr);
    $content = implode('', $arr);
    return file_put_contents($filePath, $content) !== false;
}
?>
