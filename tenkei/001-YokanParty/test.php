<?php
    $line1 = explode(" ", fgets(STDIN));
    $N = $line1[0];
    $L = $line1[1];

    $sepNum = fgets(STDIN);

    $line3 = explode(" ", fgets(STDIN));

    $score = null;

    // 1の場合には端を切断すればどちらかが最短
    if ($sepNum == 1) {
        // 先頭側
        $first = $line3[0];
        // 最後
        $last  = $L - $line[-1];

        $score = $first < $last ? $first : $last;
    }
    // 2以上で切断をする場合には端、またはどこかの間
    else {
        $bef = 0;
        foreach ($line3 as $num) {
            $tmp = $num - $bef;
            if ($score == null || $score > $tmp) {
                $score = $tmp;
            }
            $bef = $num;
        }
    }

    echo $score . "\n";