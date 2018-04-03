var zsnr=[];


$(document).ready(function () {
    $.get("../Main2/php/1/getzs.php",function (data) {
        zsnr=JSON.parse(data);
        
        create1();
    })

   /*  $.get("../php/query/getsbjc.php",function (data) {
        sbjc=JSON.parse(data);
    }); */
});

function create1() {
    var tbd1=document.getElementById("t1");
    var tr1 = document.createElement("tr");
    tbd1.appendChild(tr1);
    tr1.appendChild(document.createElement("td")).appendChild(document.createTextNode("序号"));
    tr1.appendChild(document.createElement("td")).appendChild(document.createTextNode("名称"));

    tr1.appendChild(document.createElement("td")).appendChild(document.createTextNode("下载"));
    tr1.appendChild(document.createElement("td")).appendChild(document.createTextNode("删除"));


	c1(0);
    //var pages = Math.ceil(zsnr.length / 10);
    //$("#ps1").text("共"+pages+"页");
 /*    if(zsnr.length>10){
        for(var i=0;i < 10;i++){
            c1(i);
        }
    }  else {
        for(var i=0;i <zsnr.length;i++){
            c1(i);
        }
    } */
    //$("#pi1").val("1");

}

//显示文件
function c1(x){
    var tbd1=document.getElementById("t1");
    var tr2 = document.createElement("tr");
    tbd1.appendChild(tr2);
    tr2.appendChild(document.createElement("td")).appendChild(document.createTextNode(zsnr[x].id));
    tr2.appendChild(document.createElement("td")).appendChild(document.createTextNode(zsnr[x].name));
    //tr2.appendChild(document.createElement("td")).appendChild(document.createTextNode(zsnr[x].Password));
	var url=zsnr[x].url;
	var a=document.createElement("a");
	a.setAttribute("href",url);
    tr2.appendChild(document.createElement("td")).appendChild(a).appendChild(document.createTextNode("点击下载"));

} 