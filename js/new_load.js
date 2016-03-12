function() {
	window.func || (window.Aliyun = {}), 
	window.func.loadScript = function(src, callback) {
		var c = document.createElement("script");
		c.type = "text/javascript", 
		c.readyState ? c.onreadystatechange = function() {
			("loaded" == c.readyState || "complete" == c.readyState) && (c.onreadystatechange = null, callback())
		} : c.onload = function() {
			callback()
		}, 
		c.src = src, 
		document.getElementsByTagName("head")[0].appendChild(c)
	}, 
	var loadAll = function() {

	}
	if(!window.jQuery) {
		window.func.loadScript("http://libs.useso.com/js/jquery/2.0.0/jquery.min.js", function(){});
	}
};