<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>龙珠激战传说mod（DBL mod）</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="side-wallpaper left-wallpaper"></div>
    <div class="content">
        <h1 class="shining-text">龙珠激战传说mod</h1>
        <div class="container">
            <h2>上传并处理文件</h2>
            <form action="process.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" required style="width: 100%; margin-bottom: 10px;">
                <select name="action" required style="width: 100%; margin-bottom: 10px;">
                    <option value="allcharacterfullstar">已拥有角色满星</option>
                    <option value="allcharacterfullawaking">已拥有角色觉醒VII</option>
                    <option value="maxLevel5000">所有单位等级5000</option>
                    <option value="addUnitsAndCharacters">添加单位和角色（virtual）（暂时无法使用）</option>
                    <option value="">开发中。。。</option>
                </select>
                <button type="submit" class="button">上传并处理</button>
            </form>
        </div>
        <div class="instructions">
            <h3>使用说明：（仅可PvE，NO PvP）</h3>
            <p>1. 点击“选择文件”按钮上传89bb4eb5637df3cd96c463a795005065文件。与ecd同目录</p>
            <p>2. 选择处理选项：</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;- 已拥有角色满星</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;- 已拥有角色觉醒VII</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;- 所有单位等级5000</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;- 添加单位和角色（暂时无法使用）</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;- 开发中。。。</p>
            <p>3. 点击“上传并处理”按钮。</p>
            <p>4. 处理完成后，点击下载链接下载修改后的文件。</p>
            <p>5. 如果需要继续修改其他文件，请点击“返回首页”按钮。</p>
        </div>
    </div>
    <div class="side-wallpaper right-wallpaper"></div>
</body>
</html>














