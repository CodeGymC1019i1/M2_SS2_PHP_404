<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    img{
        width: 50px;
        height: 50px;
    }
</style>
<body>
    <form method="post">
        Từ: <input id = "from" type="text" name="from" placeholder="yyyyy/mm/dd"/>
        Đến: <input id = "to" type="text" name="to" placeholder="yyyy/mm/dd" />
        <input type = "submit" id = "submit" value = "Flitter"/>
    </form>

    <?php
    function searchByDate($customers, $from_date, $to_date) {
        if(empty($from_date) && empty($to_date)){
            return $customers;
        }
        $filtered_customers = [];
        foreach($customers as $customer){
            if(!empty($from_date) && (strtotime($customer['day_of_birth']) < strtotime($from_date)))
                continue;
            if(!empty($to_date) && (strtotime($customer['day_of_birth']) > strtotime($to_date)))
                continue;
            $filtered_customers[] = $customer;
        }
        return $filtered_customers;
    }
    ?>

    <?php
    $customer_list = array(
        "0" => array("name" => "Mai Văn Hoàn", "day_of_birth" => "1983/08/20", "address" => "Hà Nội", "image" => "images/img1.jpg"),
        "1" => array("name" => "Nguyễn Văn Nam", "day_of_birth" => "1983/08/21", "address" => "Bắc Giang", "image" => "images/img2.jpg"),
        "2" => array("name" => "Nguyễn Thái Hòa", "day_of_birth" => "1983/08/22", "address" => "Nam Định", "image" => "images/img3.jpg"),
        "3" => array("name" => "Trần Đăng Khoa", "day_of_birth" => "1983/08/17", "address" => "Hà Tây", "image" => "images/img4.jpg"),
        "4" => array("name" => "Nguyễn Đình Thi", "day_of_birth" => "1983/08/19", "address" => "Hà Nội", "image" => "images/img5.jpg")
    );
    ?>

    <?php
    $from_date = NULL;
    $to_date = NULL;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $from_date = $_POST["from"];
        $to_date = $_POST["to"];
    }
    $filtered_customers = searchByDate($customer_list, $from_date, $to_date);
    ?>

    <table border="0">
        <caption><h2>Danh sách khách hàng</h2></caption>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
        </tr>
        <?php if(count($filtered_customers) === 0):?>
            <tr>
                <td colspan="5" class="message">Không tìm thấy khách hàng nào</td>
            </tr>
        <?php endif; ?>

        <?php foreach($filtered_customers as $index => $customer): ?>
            <tr>
                <td><?php echo $index + 1;?></td>
                <td><?php echo $customer['name'];?></td>
                <td><?php echo $customer['day_of_birth'];?></td>
                <td><?php echo $customer['address'];?></td>
                <td><div class="profile"><img src="<?php echo $customer['image'];?>"/></div> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>