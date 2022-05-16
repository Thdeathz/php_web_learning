<?php

require '../connect.php';
$max_date = $_GET['days'];
// if($max_date == 0){
//     echo 0;
//     exit();
// }
$max_date--;
$sql = "SELECT 
products.id AS 'ma_san_pham',
products.name AS 'ten_san_pham',
DATE_FORMAT(created_at, '%e-%m') AS 'ngay',
SUM(quantity) AS 'so_san_pham_ban_duoc'
FROM orders
JOIN order_product ON orders.id = order_product.order_id
JOIN products ON products.id = order_product.product_id
WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY
GROUP BY products.id,DATE_FORMAT(created_at, '%e-%m');";
$result = mysqli_query($connect,$sql);

//lấy dữ liệu trong 30 ngày gần nhất và đổ vào mảng arr
$arr = [];
$today = date('d');
if($today < $max_date){
    $get_day_last_month = $max_date - $today;
    $last_month = date("m", strtotime("-1 month"));
    $last_month_date = date("Y-m-d", strtotime("-1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;
    $start_day_this_month = 1;
} else {
    $start_day_this_month = $today - $max_date;
}
$this_month = date("m");

foreach($result as $each) {
    $ma_san_pham = $each['ma_san_pham'];
    if(empty($arr[$ma_san_pham])){
        $arr[$ma_san_pham] = [
            'name' => $each['ten_san_pham'],
            'y' => (int)$each['so_san_pham_ban_duoc'],
            'drilldown' => (int)$each['ma_san_pham'],
        ];
    } else {
        $arr[$ma_san_pham]['y'] += $each['so_san_pham_ban_duoc'];
    }
}

$arr2 = [];
foreach($arr as $ma_san_pham => $each) {
    $arr2[$ma_san_pham] = [
        'name' => $each['name'],
        'id' => $ma_san_pham,
    ];
    $arr2[$ma_san_pham]['data'] = [];
    if($today < $max_date){
        for($i = $start_day_last_month; $i <= $max_day_last_month; $i++){
            $key = $i . "-" . $last_month;
            $arr2[$ma_san_pham]['data'][$key] = [
                $key,
                0
            ];
        }
    }
}
foreach ($result as $each) {
    $ma_san_pham = $each['ma_san_pham'];
    $key = $each['ngay'];
    $arr2[$ma_san_pham]['data'][$key] = [
        $key,
        (int)$each['so_san_pham_ban_duoc']
    ];
}

$object = json_encode([$arr, $arr2]);
// trả dữ liệu về theo dạng json
echo $object;