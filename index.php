<?php
    // xml出力を指定
    header("Content-Type: text/xml");
 
    // 入力パラメータのチェック
    if(isset($_GET['a'])){
        $a = htmlspecialchars($_GET['a']);
        if(!is_numeric($a)){
            dispError("a が不正");
        }
    } else {
        dispError("a が未設定");
    }
 
    if(isset($_GET['b'])){
        $b = htmlspecialchars($_GET['b']);
        if(!is_numeric($b)){
            dispError("b が不正");
        }
    } else {
        dispError("b が未設定");
    }
 
    // 入力値から和差積商を計算
    $wa = $a + $b;
    $sa = $a - $b;
    $seki = $a * $b;
    if($b == 0){
        // ゼロ割はエラー
        $sho = "error";
    } else {
        $sho = $a / $b;
    }
 
    // 計算したものを出力
    echo "<?xml version='1.0' encoding='utf-8'?>";
    echo "<Result a='".$a."' b='".$b."'>";
    echo "<Wa>".$wa."</Wa>";
    echo "<Sa>".$sa."</Sa>";
    echo "<Seki>".$seki."</Seki>";
    echo "<Sho>".$sho."</Sho>";
    echo "</Result>";
 
 
    // エラーメッセージ関数
    function dispError($msg) {
        echo "<?xml version='1.0' encoding='utf-8'?>";
        echo "<Result>";
        echo "<Error>".$msg."</Error>";
        echo "</Result>";
        exit;
    }
?>