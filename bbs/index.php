
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="../css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../img/favicon.png">
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
      <a href="../">プロフィールへ戻る</a>
      <a class="navbar-brand" href="select.php">データ一覧</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="outer">


<form method="POST" action="insert.php">
   <fieldset>
    <legend>BBSﾀﾞﾖ☆</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     
     <label>エリア
      <select name="address" id="">
        <option value="北海道">北海道</option>
        <option value="東北">東北</option>
        <option value="関東">関東</option>
        <option value="中部">中部</option>
        <option value="関西">関西</option>
        <option value="中国">中国</option>
        <option value="九州">九州</option>
      </select>
     </label><br>
     <label>年齢：<input type="text" name="age"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
</form>
</div>
<!-- Main[End] -->

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
