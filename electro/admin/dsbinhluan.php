<?php 
	include'includes/check_login.php';
	include('includes/header.php'); 
	require_once "../db.php";
	// include "../include/quan_tri.php";
	
    $stmt = $conn->prepare("SELECT product_id, MAX(date_bl) , MIN(date_bl), COUNT(1) FROM comment GROUP BY product_id HAVING COUNT(1) > 0");
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
			$periods[$j].= "s";
		}
		return "$difference $periods[$j] {$tense}";
		}
		// $ngay_nhap = $hanghoa['ngay_nhap'];//$binhluan['ngay_bl'];
		// $date_sp = nicetime($ngay_nhap); // 2 days ago 	
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách bình luận</h3>
		<table class="table table-hover">
			<thead>
				<tr align="center">
					<th>Tên danh mục</th>
					<th>Số bình luận</th>
					<th>Mới nhất</th>
					<th>Cũ nhất</th>
					<th>Chi tiết</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($binhluan as $row){
					?>
						<tr>
							<td><?= $row['product_id'] ?></td>
							<td>
								<?= $row['COUNT(1)'] ?>
							</td>
							<td><?= $row['MAX(date_bl)'] ?></td>
							<td><?= $row['MIN(date_bl)'] ?></td>
							<td class="action">
								<a href="chitietbinhluan.php?product_id=<?= $row['product_id'] ?>">Chi tiết</a>
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