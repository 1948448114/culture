
var item_num = 0;
var page_num = 0;

$(document).ready(function(){
	$.get("../admin/returnNews.php?action=max_num",function(data){
		item_num = data;
		page_num = Math.ceil(item_num/10);
		$(".pager").pager({ pagenumber: 1 , pagecount: page_num,buttonClickCallback: PageClick});
	});
	for(var i=0;i<10;i++){
	$.get("../admin/returnNews.php?action=news&page=1&item="+i,function(data){
		var json = JSON.parse(data);
		$("#news_content").append("<li><a href=../"+json.link+">"+json.title+
			"</a><span class='news_time'>"+json.time+"</span></li>");
    	});
	}
})

	var PageClick = function(pageclickednumber) {
		var page_item = item_num - (pageclickednumber-1)*10;
		console.log(pageclickednumber,page_num,item_num,page_item);
		$(".pager").pager({ pagenumber: pageclickednumber, pagecount: page_num, buttonClickCallback: PageClick });
		$("#news_content").children().hide();
		if(page_item>9){
			for(var i=0;i<10;i++){
				$.get("../admin/returnNews.php?action=news&page="+pageclickednumber+"&item="+i,function(data){
				var json = JSON.parse(data);
				$("#news_content").append("<li><a href=../"+json.link+">"+json.title+
				"</a><span class='news_time'>"+json.time+"</span></li>");
				}
				)}
		}
		else{
			for(var i=0;i<page_item;i++){
			$.get("../admin/returnNews.php?action=news&page="+pageclickednumber+"&item="+i,function(data){
			var json = JSON.parse(data);
			$("#news_content").append("<li><a href=../"+json.link+">"+json.title+
			"</a><span class='news_time'>"+json.time+"</span></li>");
			}
			)}
			}
	}


	// pager.onPageChanged(pager.pageIndex){
		
	// }


