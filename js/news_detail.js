var myDate=new Date();
document.getElementById("time").innerHTML=
	myDate.getFullYear()+"-"+myDate.getMonth()+"-"+myDate.getDay()
	+"&nbsp"+myDate.getHours()+":"+myDate.getMinutes();