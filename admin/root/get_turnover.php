<?php

require '../connect.php';
$max_date = $_GET['days'];
$max_date--;
$sql = "SELECT 
DATE_FORMAT(created_at, '%e-%m') AS 'ngay',
SUM(total_price) AS 'doanh_thu'
FROM orders
WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY
GROUP BY DATE_FORMAT(created_at, '%e-%m');";
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
    for($i = $start_day_last_month; $i <= $max_day_last_month; $i++){
        $key = $i . "-" . $last_month;
        $arr[$key] = 0;
    }
    $start_day_this_month = 1;
} else {
    $start_day_this_month = $today - $max_date;
}
$this_month = date("m");
for($i = $start_day_this_month; $i <= $today; $i++){
    $key = $i . "-" . $this_month;
    $arr[$key] = 0;
}

foreach($result as $each) {
    $arr[$each['ngay']] = (float)$each['doanh_thu'];
}

// trả dữ liệu về theo dạng json
echo json_encode($arr);