<?php

//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//ここで画像の設定
$tempfile = $_FILES['fname']['tmp_name'];
$filename = './' . $_FILES['fname']['name'];

if (is_uploaded_file($tempfile)) {

    if ( move_uploaded_file($tempfile , $filename )) {
        echo $filename."をアップロードしました。";
        echo '<img src="';
        echo $filename;
        echo '">';
    } else {
        echo "ファイルをアップロードできません。";
    }
} else {
    echo "ファイルが選択されていません。";
} 


$name   = $_POST["name"];
$naiyou = $_POST["naiyou"];
$address = $_POST["address"];
$age = $_POST["age"];

//ここでギャル文字に書き換える
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
    'ぁ',//あ
    'ぃ',
    'ｩ',
    'ぇ',
    'ぉ',
    'ヵ',//か
    'ｷ',
    '＜',
    'ケ',
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
    'ﾌ',
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




if($name){
    echo $new_name;
}
if($name){
    echo $new_naiyou;
}
if($address){
    echo $address;
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,age,naiyou,address,filename,indate)VALUES(:name,:age,:naiyou,:address,:filename,sysdate())");
$stmt->bindValue(':name',   $new_name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age',    $age,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $new_naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("select.php");
}



?>