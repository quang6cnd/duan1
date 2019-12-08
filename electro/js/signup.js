
function validateForm(){
	var username= document.getElementById("username").value;
	var password= document.getElementById("password").value;
	var confirm= document.getElementById("confirm").value;
	var name= document.getElementById("name").value;
	var email= document.getElementById("email");
	var address= document.getElementById("address").value;
	var sdt= document.getElementById("phone").value;
	var image=document.getElementById("image").value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(username ==""){
		alert("Không được để rỗng");
		return false;
	}else if (username.length<8) {
		alert("Tên phải trên 8 ký tự");
		return false;
	}
	else if(password==""){
		alert("Mời nhập mk")
		return false;
	}
	else if(password.length<8){
		alert("mật khẩu trên 8 ký tự");
		return false;
	}else if(confirm==""){
		alert("Mời nhập confirm");
		return false;
	}
	else if(confirm!=password){

		alert("Mật khẩu không khớp mời nhập lại");
		return false
	}
	else if(name ==""){
		alert("Không được để rỗng");
		return false;
	}else if (name.length<8) {
		alert("Tên phải trên 8 ký tự");
		return false;
	}
	else if (email=="") {
		alert("Mời nhập email")
		return false;
	}
	else if (!filter.test(email.value)) {
		alert("email sai định dạng. thêm @ vào email ")
		email.focus();
		return false;
	}else if(address==""){
		alert("Không được để rỗng")
		return false;
	}
	else if (address.length<8) {
		alert("địa chỉ cụ thể trên 8 ký tự");
		return false;
	}else if(sdt==""){
		alert("Mời nhập sđt")
		return false;
	}
	else if(sdt.length<10||isNaN(sdt)){
		alert("số điện thoại phải =10 số");
		return false
	}
	else if(image==""){
		alert("Mời tải file ảnh lên");
		return false
	}
	else{
		return true;
	}
}