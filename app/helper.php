<?php
function createRandomSlot() {
    $array = [9, 10, 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];
    //create random array ( There are several ways for create it)
    $arrayRand = array(
        '0' => $array[array_rand($array)],
        '3' => $array[array_rand($array)],
        '6' => $array[array_rand($array)],
        '9' => $array[array_rand($array)],
        '12' => $array[array_rand($array)],
        '1' => $array[array_rand($array)],
        '4' => $array[array_rand($array)],
        '7' => $array[array_rand($array)],
        '10' => $array[array_rand($array)],
        '13' => $array[array_rand($array)],
        '2' => $array[array_rand($array)],
        '5' => $array[array_rand($array)],
        '8' => $array[array_rand($array)],
        '11' => $array[array_rand($array)],
        '14' => $array[array_rand($array)],
    );
    return $arrayRand;
}
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
        switch (1) {
            case count(array_unique($slice5)):
                $result['paylines'][] = array(implode(' ', $row) => 5);
                $point += (1000 * $amount)/100;
                break;
            case count(array_unique($slice4)):
                $result['paylines'][] = array(implode(' ', $row) => 4);
                $point += (200 * $amount)/100;
                break;
            case count(array_unique($slice3)):
                $result['paylines'][] = array(implode(' ', $row) => 3);
                $point += (20 * $amount)/100;
                break;
            default:
                break;
        }

    }
    $result['points'] = $point;
    return $result;
}
