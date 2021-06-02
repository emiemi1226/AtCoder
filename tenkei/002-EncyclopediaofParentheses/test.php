<?php
    // $line1 = explode(" ", fgets(STDIN));
    // $N = $line1[0];
    // $L = $line1[1];
    $N = fgets(STDIN);

    $left  = "(";
    $right = ")";

    if ($N % 2 == 1) {
        return;
    }

    // 半分を超えた値左カッコは出ない
    $N_2 = $N / 2;

    // 作成するカッコの数だけ処理をする
    doDesu("", $N, 0, 0);

    // str : 作成した文字列
    // num : 残りの処理回数
    // leftNum : 左にあるカッコの数
    // leftNum2 : 左にある、右のカッコより多い数
    function doDesu($str, $num, $leftNum, $leftNum2) {
        global $N;
        global $N_2;

        // 計算が終了したら結果を出力する
        if ($num == 0) {
            if (substr($str, -1) != "(") {
                echo $str . "\n";
            }
        } else {
            // 半数より多い数が左カッコになることはない
            if ($leftNum > $N_2) {
                return;
            }

            // 右に左カッコを置く
            doDesu($str."(", $num - 1, $leftNum + 1, $leftNum2 + 1);
            // 右に右カッコをおける場合には置く
            if ($leftNum2 > 0) {
                doDesu($str.")", $num - 1, $leftNum, $leftNum2 - 1);
            }
        }
    }

