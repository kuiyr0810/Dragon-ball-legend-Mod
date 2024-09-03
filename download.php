<?php
if (isset($_GET['file']) && isset($_GET['name'])) {
    $filePath = $_GET['file'];
    $fileName = $_GET['name'];

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo '文件不存在。';
    }
} else {
    echo '无效的请求。';
}
