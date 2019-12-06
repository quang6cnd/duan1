<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li style="background:#1b926c;color:#fff;">
            <a href="index.php" style="color:#fff;"><i class="fa fa-fw fa-dashboard"></i> Thông tin</a>
        </li>                    
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="glyphicon glyphicon-list"></i> &nbsp;Danh mục sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo_dm" class="collapse">
                <li>
                    <a href="them_danhmucsp.php">Thêm mới</a>
                </li>
                <li>
                    <a href="list_danhmucsp.php">Danh sách</a>
                </li>
            </ul>
        </li> 
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_bv"><i class="glyphicon glyphicon-blackboard"></i>&nbsp; Sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo_bv" class="collapse">
                <li>
                    <a href="them_sanpham.php">Thêm mới</a>
                </li>
                <li>
                    <a href="list_sanpham.php">Danh sách</a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="fa fa-fw fa-file"></i> Hỗ trợ trực tuyến <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo_dm" class="collapse">
                <li>
                    <a href="#">Thêm mới</a>
                </li>
                <li>
                    <a href="#">Danh sách</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_sl"><i class="glyphicon glyphicon-picture"></i> &nbsp;Slider <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo_sl" class="collapse">
                <li>
                    <a href="add_slider.php">Thêm mới</a>
                </li>
                <li>
                    <a href="list_slider.php">Danh sách</a>
                </li>
            </ul>
        </li> 	
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_vd"><i class="fa fa-fw fa-file"></i> &nbsp;Bình Luận<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo_vd" class="collapse">
              <!--   <li>
                    <a href="addvideo.php">Thêm mới</a>
                </li> -->
                <li>
                    <a href="dsbinhluan.php">Danh sách</a>
                </li>
            </ul>
        </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo_u"><i class="glyphicon glyphicon-list"></i> &nbsp; Hóa Đơn <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo_u" class="collapse">
                    <li>
                        <a href="hoadonban.php">Danh sách hóa đơn</a>
                    </li>
                </ul>

            </li> 
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_us"><i class="glyphicon glyphicon-user"></i> &nbsp;Tài khoản<i class="fa fa-fw fa-caret-down"></i></a>
           <ul id="demo_us" class="collapse">
           <li>
                    <a href="them_user.php">Thêm mới</a>
                </li>
                <li>
                    <a href="list_user.php">Danh sách</a>
                </li>
            </ul>
        </li> 

        <script> 
        $(document).ready(function(){
          $("#flip").click(function(){
            $("#panel").slideToggle("slow");
          });
        });
        </script>
        <style> 
        #panel, #flip {
          padding: 5px;
         padding-top:   15px;
         padding-left:  15px;
         height: 50px;
        
        }

        #panel {
          padding: 200px;
          display: none;
        }
        </style> 

 	
        
        </li>           				
    </ul>
</div>