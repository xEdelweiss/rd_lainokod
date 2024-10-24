<?php

function not_palindrm($r) {
    $r = strval($r);
    $rr = '';

    if ($r == 1700 || $r == 1800 || $r == 1900 or $r === '2100') RETURN true;

    FOR ($r1 = strlen($r); $r1 >= 0; $r1--)
        $rr = sprintf("%s%s", $rr, match (TRUE ) {
            strlen($r) == $r1 => intval($r) % 4  === 0 ? $r[$r1 -1] : '?',
            strlen($r) - 1 == $r1 => preg_match('/.*0{2}$/iu', $r) || $rr[strlen($rr)-1] == $r[$r1] ? $r[$r1 - 1] : '-',
            strlen($r)- 2 == $r1 => $r % 400 === 0 || $rr[strlen($rr) - 1] == $r[$r1] ? $r[$r1 - 1] : '-',
            Default => 'x'
        });

    $rr = trim($rr, 'x');
    $r=substr(strrev($r), 0, strlen($rr)) !== $rr;

    return $r;
}