<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件处理网站</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
</head>
<body>
    <div class="side-wallpaper left-wallpaper"></div>
    <div id="particles-js" style="position: absolute; width: 100%; height: 100%;"></div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        //背景粒子动效
        particlesJS("particles-js", {
          "particles": {
              "number": { "value": 80 },
              "size": { "value": 3 }
          },
          "interactivity": {
              "events": {
                  "onhover": { "enable": true, "mode": "repulse" }
               }
          }
      });
    </script>
    <div class="content">
        <h1 id="typeWriter" class="shining-text"></h1>
        <div id="clock">00:00:00</div>
        <div class="container">
            <h2>上传并处理文件</h2>
            <form id="myForm" action="process.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input class="sl" type="file" name="file" required>
                <br><br>
                <script>
                    function updateChildOptions() {
                        try {
                            const parentValue = document.getElementById("parentSelect").value;
                            const action = document.getElementsByName("action")[0];
                            const form = document.getElementById("myForm");
            
                            // 清空子框选项
                            action.innerHTML = '';
            
                            // 设置子功能选项
                            const optionsMap = {
                                'option1': '<option value="1">请选择要处理的项目</option>',
                                'option2': `
                                    <option value="2">请选择功能</option>
                                    <option value="allcharacterfullstar">全角色满星</option>
                                    <option value="allcharacterfullawaking">全角色全觉醒</option>
                                    <option value="maxLevel5000">全角色5000级</option>
                                `,
                                'option3': `
                                    <option value="3">请选择功能</option>
                                    <option value="jsonformat">json格式化</option>
                                `
                            };
            
                            // 更新子功能下拉框
                            if (optionsMap[parentValue]) {
                                action.innerHTML = optionsMap[parentValue];
                            } else {
                                action.innerHTML = '<option value="">请先选择主功能</option>'; // 处理未知选项
                            }
            
                            // 如果选择的是option2，修改form的action属性
                            form.action = parentValue === 'option2' ? 'process.php' : 'process1.php'; // 设置action
            
                        } catch (error) {
                            console.error("更新子功能选项时出错：", error);
                            alert("更新子功能选项失败，请重试。");
                        }
                    }
            
                    function validateForm() {
                        const action = document.getElementsByName("action")[0];
                        if (action.value === "") {
                            alert("请选择子功能后再提交表单。");
                            return false; // 阻止表单提交
                        }
                        return true; // 允许提交
                    }
                </script>
                <label class="center" for="parentSelect">请选择要处理的项目:</label>
                <select id="parentSelect" onchange="updateChildOptions()">
                    <option value="option1">请选择项目</option>
                    <option value="option2">龙珠激战传说MOD</option>
                    <option value="option3">json文件处理</option>
                </select>
                <br><br>
                <label class="center" for="action">选择子功能:</label>
                <select name="action">
                    <option value="">请先选择主功能</option>
                </select>
                <br><br>
                <button type="submit" class="button">上传并处理</button>
            </form>
        </div>
    </div>
    <div class="side-wallpaper right-wallpaper"></div>
</body>
</html>















