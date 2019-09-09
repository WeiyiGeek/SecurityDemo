<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>获取当前用户的Cookie值</title>
    <script type="text/javascript">
    if(document.cookie == ""){
      document.cookie='CookiesValue=Hello_Javascript';
    }else{
      console.log("当前浏览器已设置Cookie");
    }

    </script>
  </head>
  <body>
    <?php
      $callback = $_GET['callback'];
      echo "$callback";
    ?>
    <div id="callback">后台显示ATTACK Result</div>
  </body>
</html>
