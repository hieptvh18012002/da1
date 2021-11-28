<?php

function province_select_all(){
    $sql = "SELECT * FROM province";
    return pdo_query($sql);
}