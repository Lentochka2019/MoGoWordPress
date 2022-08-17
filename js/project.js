var varCount = 1;
$(function() {
    $('.button-search').on('click', function () {
        $('.form-inline').toggleClass('show noshow');
        $("input[type='search']").focus();
    });  
    
});

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("Btntop").style.display = "block";
    } else {
        document.getElementById("Btntop").style.display = "none";
    }
}
var t;
function topFunction() {
	var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
	if(top > 0) {
		window.scrollBy(0,-100);
		t = setTimeout('topFunction()',50);
	} else clearTimeout(t);
	return false;
}
