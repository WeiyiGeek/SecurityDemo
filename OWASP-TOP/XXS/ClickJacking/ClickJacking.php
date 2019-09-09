<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        header("X-Frame-Options:DENY");
    ?>
    <title>ClickJacking Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        iframe {
            position: absolute; /*importent*/
            width: 50%;
            height: 50%;
            top: 10%;
            z-index: 2;
            opacity: 0.1;
        }

        button {
               position: absolute;
                left: 25%;
                top: 14%;
                z-index: 1;
                width: 200px;

        }

        #test {
            top: 520px;
        }
    </style>
</head>
<body>
    
    <iframe src="http://baidu.com/index.html" frameborder="0"></iframe>
    <button onclick="javascript:alert('CLICK')">Click demo</button>
    <style type="text/css">
        #imgc {
            position: absolute;
            left: 12px;
            top:10px;
            z-index:2;
        }
        #s {
            z-index: 1;
            opacity: 0.1;
        }
    </style>
    <div id="test">
        <a id = "s" href='#' onclick="javascript:allert('xSS');">This is a demoqwewwwqqweqwewq</a>
        <a href="http://baidu.com"><img id="imgc" src="https://ss0.baidu.com/73t1bjeh1BF3odCf/it/u=623449412,4113949575&fm=85&s=6342F903912225035A9C6811030010E2" alt=""></a>
    </div>
</body>
</html>