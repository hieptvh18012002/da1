<?php
require_once "./app/common/bridge.php";
callModel("addressModels");

// xử lí address checkout
if (isset($_GET['districtId'])) {
    echo '<option selected disable>-----Phường xã----</option>';
    $districtId = $_GET['districtId'];
    $ward = pdo_query("SELECT * FROM ward WHERE districtid='$districtId'");
    foreach ($ward as $item) {
        echo '<option value"' . $item["wardid"] . '">' . $item["name"] . '</option>';
    }
}
