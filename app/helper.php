<?php
function calculateSlot(array $paylineArray, array $refArray, int $amount)
{
    $result = [];
    $result['paylines'] = [];
    $point = 0;
    foreach ($paylineArray as $row) {
        $realValue = [$refArray[$row[0]], $refArray[$row[1]], $refArray[$row[2]], $refArray[$row[3]], $refArray[$row[4]]];
        $slice5 = array_slice($realValue, 0, 5);
        $slice4 = array_slice($realValue, 0, 4);
        $slice3 = array_slice($realValue, 0, 3);
        if(count(array_unique($slice5))==1) {
            $result['paylines'][] = array(implode(' ', $row) => 5);
            $point += (1000 * $amount)/100;
            continue;
        }elseif (count(array_unique($slice4))==1) {
            $result['paylines'][] = array(implode(' ', $row) => 4);
            $point += (200 * $amount)/100;
            continue;
        }elseif (count(array_unique($slice3))==1) {
            $result['paylines'][] = array(implode(' ', $row) => 3);
            $point += (20 * $amount)/100;
            continue;
        }else {
            continue;
        }

    }
    $result['points'] = $point;
    return json_encode($result);
}
