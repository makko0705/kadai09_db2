<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
$title = '☆入力する☆';


try{
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
                move_uploaded_file($_FILES['file']['tmp_name'], './img/'.$_FILES['file']['name']);
        }
}catch(Exception $e) {
        echo 'エラー:', $e->getMessage().PHP_EOL;
}
?>

<!DOCTYPE html>
<html lang="ja">
<?php
include("../tpl/head.php");
?>

<body class="bbs_index">

<!-- Head[Start] -->
<?php include("../tpl/header.php");?>
<!-- Head[End] -->



<!-- Main[Start] -->
<div class="outer">
<form action="insert.php" method="post" enctype="multipart/form-data">
<legend>BBSﾀﾞﾖ☆</legend>
<table>
<tr>
    <th>名前は?</th>
  </tr>
  <tr>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <th>プリクラ貼ってけ</th>
  </tr>
  <tr>
    <td><input type="file" name="fname"></td>
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
  </select></td>
  </tr>
  <tr>
    <th>年齢：</th>
  </tr>
  <tr>
    <td><input type="text" name="age" value="<?=$v["age"]?>"></td>
  </tr>
  <tr>
    <th>コメント☆</th>
  </tr>
  <tr>
    <td><textArea name="naiyou" rows="4" cols="40"></textArea></td>
  </tr>
</table>

<input type="submit" value="アップロード" class="submit btn">

</form>
</body>
</html>
