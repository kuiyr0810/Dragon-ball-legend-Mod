<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'functions.php';
require 'bitwiseNot.php';

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>处理结果</title>
    <link rel="stylesheet" href="css/last.css"> <!-- 引用外部CSS文件 -->
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['file']) && isset($_POST['action'])) {
                $originalFileName = $_FILES['file']['name'];
                $tempFilePath = $_FILES['file']['tmp_name'];
                $action = $_POST['action'];

                // 初次按位取反操作
                if (!bitwiseNot($tempFilePath)) {
                    echo '<p class="error">初次按位取反操作失败</p>';
                    exit;
                }

                // 读取文件内容
                $fileContent = file_get_contents($tempFilePath);

                // 根据选择的操作处理文件
                $newContent = modifyJson($fileContent, $action);
                if ($newContent === false) {
                    echo '<p class="error">JSON 处理失败</p>';
                    exit;
                }

                // 确保目录存在
                $uploadDir = 'uploads/processed/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // 使用原文件名保存处理后的文件
                $processedFilePath = $uploadDir . $originalFileName;
                if (file_put_contents($processedFilePath, $newContent) === false) {
                    echo '<p class="error">无法写入文件内容</p>';
                    exit;
                }

                // 再次按位取反操作
                if (!bitwiseNot($processedFilePath)) {
                    echo '<p class="error">按位取反操作失败</p>';
                    exit;
                }

                // 提供下载链接
                echo '<h1>文件已成功处理</h1>';
                echo '<p>点击下面的链接下载处理后的文件。</p>';
                echo '<a href="download.php?file=' . urlencode($processedFilePath) . '&name=' . urlencode($originalFileName) . '">下载处理后的文件</a>';
                echo '<br><a href="index.php" class="button">返回首页</a>';
            } else {
                echo '<p class="error">文件上传失败或未选择处理方式</p>';
                echo '<br><a href="index.php" class="button">返回首页</a>';
            }
        } else {
            echo '<p class="error">无效的请求方法</p>';
            echo '<br><a href="index.php" class="button">返回首页</a>';
        }
        ?>
    </div>
</body>
</html>




























