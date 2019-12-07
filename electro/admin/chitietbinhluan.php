<?php include('includes/header.php');
	require_once "../connection.php";
	include "../include/quan_tri.php";
	
   $product_id = "";
	if(isset($_GET['product_id'])){
		$product_id= $_GET['product_id'];
	}
	//
	$stmt = $conn->prepare("SELECT product.image, product.name from product where product_id=$product_id");
	$stmt->execute();
	$sanpham = $stmt->fetch();
	//
    $stmt = $conn->prepare("
    	SELECT users.avatar,users.email,comment.*
		From comment,product,users
		where product.product_id = comment.product_id
		and users.username = comment.username
		and comment.product_id=$product_id");
    // $stmt = $conn->prepare("");
	$stmt->execute();
	$binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//Đếm thời gian comment
	function nicetime($date){
		if(empty($date)) {
			return "No date provided";
		}
		$periods         = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỷ");
		$lengths         = array("60","60","24","7","4.35","12","10");
		$now             = time();
		$unix_date       = strtotime($date);
       // check validity of date
		if(empty($unix_date)) {
			return "Ngày tồi tệ";
		}
    	// is it future date or past date
		if($now > $unix_date) {   
			$difference     = $now - $unix_date;
			$tense         = "trước";
		} else {
			$difference     = $unix_date - $now;
			$tense         = "từ bây giờ";
		}
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}
		$difference = round($difference);
		if($difference != 1) {
			$periods[$j].= " ";
		}
		return "$difference $periods[$j] {$tense}";
		}
		// $ngay_nhap = $hanghoa['ngay_nhap'];//$binhluan['ngay_bl'];
		// $date_sp = nicetime($ngay_nhap); // 2 days ago 	
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Chi tiết bình luận</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Ảnh đại diện</th>
					<th>Tên người dùng</th>
					<th>Nội dung</th>
					<th>Thời gian</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($binhluan as $row){
						$dem_tg = $row['date_bl'];
						$date_bl1 = nicetime($dem_tg);
					?>
						<tr>
							<td><?= $row['user_id'] ?></td>
							<td><img style="width: 70px" src="../img/user/<?= $row['images'] ?>" alt=""></td>
							<td><?= $row['email'] ?></td>
							<td><?= $row['content'] ?></td>
							<td><?= $date_bl1 ?></td>
							
							<td class="action">
								<a href="delete.php?ma_bl=<?= $row['ma_bl'] ?>">Xóa</a>
							</td>
						</tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include ('includes/footer.php');?>