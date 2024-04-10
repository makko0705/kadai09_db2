<?php
$id = $_GET["id"];
//１．PHP
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="../css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../img/favicon.png">
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="outer">
    <div class="container">
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$v["email"]?>"></label><br>
     <label>エリア；
      <select name="address" id="">
        <option value="北海道">北海道</option>
        <option value="東北">東北</option>
        <option value="関東">関東</option>
        <option value="中部">中部</option>
        <option value="関西">関西</option>
        <option value="中国">中国</option>
        <option value="九州">九州</option>
      </select></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$v["age"]?>"></label><br>
     <label><textArea name="naiyou" class="naiyou" rows="4" cols="40"><?=$v["naiyou"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
</div>
</div>

<!-- Main[End] -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  var change_text = $(".naiyou").val();
  console.log(change_text);
  change_text = change_text.replace("a","ァ");
  change_text = change_text.replace("i","ィ");
  change_text = change_text.replace("u","ぅ");
  change_text = change_text.replace("e","ぇ");
  change_text = change_text.replace("o","ァ");
  change_text = change_text.replace("k","ァ");
  change_text = change_text.replace("a","ァ");
  change_text = change_text.replace("a","ァ");
  change_text = change_text.replace("a","ァ");
  console.log(change_text);
  $(".naiyou").text(change_text);

</script>
</body>
</html>



