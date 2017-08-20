function cek(form){
	if(form.elements[0].value=="")
	{
		alert("Mohon Maaf, Mohon Masukkan Barang yang Anda Ingin Cari!")
		form.cari.focus();
		form.cari.select();
		return(false);
	}

}
function cekloginpembeli(form){
	if(form.elements[0].value==""){
		alert("Mohon Masukkan Username Anda!");
		form.uname.focus();
		form.uname.select();
		return(false);
	}
	else if(form.elements[1].value==""){
		alert("Mohon Masukkan Password Anda!");
		form.psw.focus();
		form.psw.select();
		return(false);
	}
	alert ("Selamat Datang di Website PAMUS, Cari Informasi Seputar Mutiara yang Anda Inginkan!");
	return (true);
}

function cekloginpenjual(form){
	if(form.elements[0].value==""){
		alert("Mohon Masukkan Username Anda!");
		form.uname.focus();
		form.uname.select();
		return(false);
	}
	else if(form.elements[1].value==""){
		alert("Mohon Masukkan Password Anda!");
		form.psw.focus();
		form.psw.select();
		return(false);
	}
	alert ("Selamat Datang di Website PAMUS, Cari Informasi Seputar Mutiara yang Anda Inginkan!");
	return (true);
}

function registrasi(form){
	if(form.elements[0].value==""){
		alert("Mohon Masukkan Data Nama Anda!");
		form.nama.focus();
		form.nama.select();
		return(false);
	}
	else if(form.elements[1].value==""){
		alert("Mohon Masukkan Email Anda!");
		form.email.focus();
		form.email.select();
		return(false);
	}
	else if(form.elements[2].value==""){
		alert("Mohon Masukkan Username Anda!");
		form.username.focus();
		form.username.select();
		return(false);
	}
	else if(form.elements[3].value==""){
		alert("Mohon Masukkan Password Anda!");
		form.password.focus();
		form.Password.select();
		return(false);
	}
	else if(form.elements[4].value==""){
		alert("Mohon Masukkan Ulang Password Anda!");
		form.repassword.focus();
		form.repassword.select();
		return(false);
	}
	else if(form.elements[4].value!=form.elements[3]){
		alert("Mohon Masukkan Ulang Password Anda!");
		form.repassword.focus();
		form.repassword.select();
		return(false);
	}
	alert ("Selamat Datang di Website PAMUS, Cari Informasi Seputar Mutiara yang ANda Inginkan!");
	return (true);
}
function upload(form){
	if(form.elements[0].value==""){
		alert("Mohon Masukkan Nama Barang!");
		form.barang.focus();
		form.barang.select();
		return(false);
	}
	else if(form.elements[2].value==""){
		alert("Mohon Masukkan Harga Barang!");
		form.harga.focus();
		form.harga.select();
		return(false);
	}
	else if(form.elements[3].value==""){
		alert("Mohon Deskripsikan Barang!");
		form.desk.focus();
		form.desk.select();
		return(false);
	}
	alert ("Barang Sudah Ter-Upload");
	return (true);
}