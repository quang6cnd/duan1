<?php 
								
						$message = "";
						if (isset($_POST['create_bl'])) {
							if (isset($_SESSION['username'])) {
								extract($_REQUEST);
								$username = $_SESSION['username'];
								
								if (empty($content)) {
									$message = "Bạn chưa nhập bình luận !";
								}

							}else{
								$message = "Bạn phải đăng nhập thì mới có thể bình luận !";
							}

							if ($message == "") {
									$date_bl = date('Y/m/d');
									
									$sql_bl = "INSERT INTO comment(content,date_bl,id_user,id) VALUES('$content','$date_bl','$id_user','$id')";
									$stmt_bl = $conn->prepare($sql_bl);
									$stmt_bl->execute();

									if ($stmt_bl->rowCount() >0) {
										echo "<meta http-equiv='refresh' content='0'>";
									}else{
										$message = 'Thất bại !';
									}
								}
						}
					?>
