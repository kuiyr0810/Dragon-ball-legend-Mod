// main.js
/*
document.addEventListener("contextmenu", function(event){
    event.preventDefault();
    alert("\u53F3\u952E\u529F\u80FD\u5DF2\u7981\u7528\uFF01!");
});
*/

//时钟
function updateClock() {
    const now = new Date();
    const timeString = now.toLocaleTimeString();
    document.getElementById('clock').innerText = timeString;
}
setInterval(updateClock, 1000);

//背景颜色
/*
function changeBackgroundColor() {
    const colors = ["#FF5733", "#33FF57", "#3357FF", "#FF33A1", "#A1FF33"];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    document.body.style.backgroundColor = randomColor;
}
*/
//标题打字形态展示
const text = "\u6587\u4ef6\u5904\u7406\u7f51\u7ad9";
let index = 0;

function typeWriter() {
    if (index < text.length) {
        document.getElementById("typeWriter").innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 100);
    }
}
window.onload = typeWriter;






