<?php
//1. POSTデータ取得
$email  = $_POST["email"];
$age    = $_POST["age"];
$address = $_POST["address"];



//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//ここでギャル文字に書き換える
$name   = $_POST["name"];
$naiyou = $_POST["naiyou"];

$target = array(
    'あ', 
    'い',
    'う',
    'え',
    'お',
    'か',//か
    'き',
    'く',
    'け',
    'こ',
    'さ',//さ
    'し',
    'す',
    'せ',
    'そ',
    'た',//た
    'ち',
    'つ',
    'て',
    'と',
    'な',//な
    'に',
    'ぬ',
    'ね',
    'の',
    'は',//は
    'ひ',
    'ふ',
    'へ',
    'ほ',
    'ま',//ま
    'み',
    'む',
    'め',
    'も',
    'や',//や
    'ゆ',
    'よ',
    'ら',//ら
    'り',
    'る',
    'れ',
    'ろ',
    'わ',//わ
    'を',
    'ん'
);
$replace = array(
    '亜',//あ
    'ﾚヽ',
    'ｩ',
    '之',
    '汚',
    'ヵ',//か
    'ｷ',
    '＜',
    'ﾚﾅ',
    'ｺ',
    '±',//さ
    'Ｕ',
    'ㇲ',
    '世',
    'ｿ',
    'ﾅﾆ',//た
    'ﾁ',
    '⊃',
    'ﾃ',
    'ㇳ',
    'ﾅょ',//な
    '(ﾆ',
    'йu',
    'йё',
    'σ',
    'ﾚょ',//は
    'Ω',
    'ζヽ',
    'Λ',
    'ﾚま',
    'мα',//ま
    '三',
    'ﾑ',
    '×',
    'м○',
    'Ча',//や
    'Чц',
    'ЧО',
    'яа',//ら
    'ﾚ｣',
    'ゑ',
    'яё',
    '□',
    'ヮ',//わ
    'щО',
    'ω'
);
$new_naiyou = str_replace($target, $replace, $naiyou);
$new_name = str_replace($target, $replace, $name);


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,address,indate)VALUES(:name,:email,:age,:naiyou,:address,sysdate())");
$stmt->bindValue(':name',   $new_name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age',    $age,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $new_naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("select.php");
}
?>
