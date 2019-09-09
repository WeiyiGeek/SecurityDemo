var testdiv = document.createElement('textarea');
    testdiv.setAttribute("id","scanResult");
    testdiv.setAttribute("cols", "30");
    testdiv.setAttribute("rows", "10");
    testdiv.setAttribute("value", "端口扫描基于JavaScript：\n");
   document.body.appendChild(testdiv);
   
   var target = '127.0.0.1';
    var port = "21,22,23,80,88,1433,3306,5900,8080,8081,8089,8088,8443,8888";
    var timeout = 1000;

   //创建一个AttackAPI的类
        var AttackAPI = {
            Author: "WeiyiGeek",
            Version: "JSScanPort 1.0",
            Desc: "基于js技术的端口探测扫描,采用image对象进行探测;",
            PortScanner:{}
        }
        console.log("%c.... "+AttackAPI.Version+" ....\n", "color:red");
        console.log("Author:"+AttackAPI.Author + "\n"+AttackAPI.Desc);

        AttackAPI.PortScanner.scanPort = function (callback, target, port, timeout) {
            var timeout = (timeout == null) ? 100 : timeout;
                //一个image对象
                var img = new Image();
                img.onerror = function () {
                    if (!img) {
                        return;
                    }
                    img = undefined;
                    callback(target, port, 'open');
                };
            img.onload = img.onerror;  //非常重要
            switch (port) {
                case 21: img.src = 'ftp://' + ftp + '@' + target + '/'; break;//ftp
                case 25: img.src = 'mailto://' + stmp + '@' + target; break;//smtp **
                case 70: img.src = 'gopher://' + target + '/'; break;//gopher
                case 119: img.src = 'news://' + target + '/'; break;//nntp **
                case 443: img.src = 'https://' + target + '/';  break;
                case 8843: img.src = 'https://' + target + ':' +port;
                default: img.src = 'http://' + target + ':'+ port;  //这里给src赋予了地址与端口
            }
            //这里执行!img则为真,否则为假,延迟1秒执行(关键代码)
            //当执行img的时候调用onerror的方法,通则为真,!img为假,执行open,然后给延迟函数给值给img为undefined（！undefined = true）,如果在失败后执行setTimeout中的!img为假,则为close的
            setTimeout(function () {
                if (!img) {
                    return;
                }
                img = undefined;
                callback(target, port, 'closed');
            }, timeout);

        
         };

        //对于端口的遍历
        AttackAPI.PortScanner.scanTarget = function (callback, target, ports, timeout) {
                for (index = 0; index < ports.length; index++) {
                    AttackAPI.PortScanner.scanPort(callback, target, ports[index], timeout);
                }
        };

        //结果的输出
            var result = document.getElementById('scanResult');
            var callback = function (target, port, status) {
                result.value += target + ':' + port + ' ' + status + "\n";
            };

            var scan = function (form) {
                result.value = "";
                AttackAPI.PortScanner.scanTarget(callback, target, port.split(','), timeout);
            };

        scan();