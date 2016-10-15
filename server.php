<?php
//AJAX请求数据,输出不能有错误提示,和非需要的额外数据,否则,前端接收不到数据
error_reporting(0);

$inAjax = $_POST['inAjax'];
$do = $_POST['do'];
$do = $do ? $do : "default";

if (!$inAjax)
    return false;

include_once "db.class.php";

switch ($do) {
    case "checkMember":
        $username = $_POST['username'];
        $sql = "SELECT * FROM check_member WHERE username='$username'";
        $result = $dbObj->getOne($sql);
        $resJson = json_encode($result);

        echo (!empty($result)) ?  $resJson: "null";
        break;

    case "default":
        die("nothing");
        break;
}