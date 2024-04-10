<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_an_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link href="../css/style.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../img/favicon.png">

</head>
<body class="bbs_select">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="outer">
    <div class="container">


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

      <?php foreach($values as $v){ ?>
        <div class="chat_item">
          <p class="chat_head"><span class="id"><?=h($v["id"])?></span><span class="name"><?=h($v["name"])?></span></p>
          <div class="text"><?=h($v["naiyou"])?></div>
          <div class="btn_area">
            <a class="btn" href="detail.php?id=<?=h($v["id"])?>">更新</a>
            <a class="btn" href="delete.php?id=<?=h($v["id"])?>">削除</a>
          </div>
        </div>
      <?php } ?>

  </div>
</div>
<!-- Main[End] -->

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a),"です");

</script>
</body>
</html>
