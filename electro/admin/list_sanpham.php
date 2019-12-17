
<?php
	include'includes/check_login.php';
	require_once "../db.php";

	require_once '../commons/constants.php';
	require_once '../commons/helpers.php';
	// include "../include/quan_tri.php";
$sql="SELECT * FROM product INNER JOIN categories ON product.id_cate=categories.id_cate";
$stmt=$conn->prepare($sql);
$stmt->execute();
$join=$stmt->fetchAll(PDO::FETCH_ASSOC);

	// if(isset($_GET['id'])){
	// 	$id = $_GET['id'];

	// 	$sl = "SELECT * from product where id=$id";
	// 	$stmt = $conn->prepare($sl);
	// 	$stmt->execute();
	// 	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<?php include('includes/header.php'); ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách Sản phẩm</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>

					<th>ID sản phẩm</th>
					<th>Danh mục</th>	
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Đơn giá</th>
					<th>Giảm giá</th>
					<th>Số lượng</th>
					<th>Rating</th>
					<th>Trạng thái</th>
					<th width="150">Action</th>
				</tr>
				<?php
					//đổ dữ liệu ra
				foreach($join as $row){
					$gia_sp = number_format($row['price'], 0, '', ',');
					$gia_km = number_format($row['sale_price'], 0, '', ',');
					?>
					<tr>
						<!-- 	<td><input name="mang[]"  type="checkbox" value="<?= $row['ma_hh'] ?>"></td> -->
						<td style="color: #888">
							<?php 
							if(isset($i)){
								$i += 1;
							}else{
								$i = 1;
							}

							echo $i;
							?>

						</td>
						<td><?= $row['id'] ?></td>
						<td><?= $row['name_cate'] ?></td>
						<td><?= $row['nameproduct'] ?></td>
						
						<td><img style="max-height: 40px" src="../img/<?= $row['image'] ?>" alt=""></td>
						<td><?= $gia_sp ?> VND</td>
						<td><?= $gia_km ?> VND</td>
						<td><?= $row['amount'] ?></td>
						<td><?= $row['rating'] ?></td>
						<td><?= $row['status'] ?></td>
						<td class="action">
							<a href="sua_sanpham.php?id=<?= $row['id'] ?>">Thay đổi | </a>
							<a href="xoa_sanpham.php?id=<?= $row['id'] ?>" OnClick="return confirm('Xóa Sản phẩm này ?');">Xóa</a>
						</td>
					</tr>
					<?php
				}
				?>

			</tr>

		</tbody>
	</table>
		<!-- <?php 
		echo "<ul class='pagination' style='float:right;'>";
				if ($per_page > 1)//số trang lớn hơn 1 mới cho hiển thị ra nút phân trang
				 {
					$current_page=($start / $limit) + 1;
					//Nếu không phải trang đầu thì hiển thị nút back về trang trước
					if ($current_page !=1) {
						echo "<li><a href='list_sanpham.php?s=".($start - $limit)."&p={$per_page}'>Back</a></li>";
					}
					//Hiển thị những phần còn lại của trang
					for ($i=1; $i <= $per_page; $i++) { 
						if ($i!=$current_page) {
						echo "<li><a href='list_sanpham.php?s=".($limit*($i-1))."&p={$per_page}'>{$i}</a></li>";
						}
						else//trường hợp =i sẽ không cho nó link(ấn vào chính nó)
						{
							echo "<li class='active'><a>{$i}</a></li>";
						}
					}
					//Nếu không phải trang cuối thì hiển thị nút next
					if ($current_page !=$per_page) {
						echo "<li><a href='list_sanpham.php?s=".($start + $limit)."&p={$per_page}'>Next</a></li>";
					}
				}
				echo "</ul>";
				?> -->
			</div>
		</div>
		<?php include('includes/footer.php') ?>
