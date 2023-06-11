<?php

function MenuActive($menu = '')
{
    if ($_GET['menu'] == $menu) {
        return 'active';
    } else {
        return '';
    }
}

function MasterData($sub = [])
{
    $act = '';
    if (in_array($_GET['menu'], $sub)) {
        $act = 'open active';
    } else {
        $act = '';
    }

    return $act;
}
