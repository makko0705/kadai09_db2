<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$id = $_GET["id"];
$title = '☆更新する';

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

<!DOCTYPE html>
<html lang="ja">

  <?php include("../tpl/head.php");?>

<body class="bbs_detail">

<!-- Head[Start] -->
<?php include("../tpl/header.php");?>
<!-- Head[End] -->


<!-- Main[Start] -->
<div class="outer">
<form method="POST" action="update.php">
  <legend>更新スるょ</legend>
  <fieldset>
  <table>
    <tr>
      <th>名前は?</th>
    </tr>
    <tr>
      <td><input type="text" name="name" value="<?=$v["name"]?>"></td>
    </tr>
    <tr>
      <th>どこ住み?</th>
    </tr>
    <tr>
      <td><select name="address" id="">
        <option value="北海道">北海道</option>
        <option value="東北">東北</option>
        <option value="関東">関東</option>
        <option value="中部">中部</option>
        <option value="関西">関西</option>
        <option value="中国">中国</option>
        <option value="九州">九州</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>年齢</th>
    </tr>
    <tr>
      <td><input type="text" name="age" value="<?=$v["age"]?>"></td>
    </tr>
    <tr>
      <th>コメント☆</th>
    </tr>
    <tr>
      <td><textArea name="naiyou" class="naiyou" rows="4" cols="40"><?=$v["naiyou"]?></textArea></td>
    </tr>

  </table>
  <input type="hidden" name="id" value="<?=$v["id"]?>">
  <input type="submit" value="更新する" class="submit btn">
</fieldset>
</form>
</div>

<!-- Main[End] -->

</body>
</html>



