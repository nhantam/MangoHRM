// JavaScript Document

var ChungKhoanTop={
	Init:function(){
		var a=this;
		$.getJSON("http://solieu7.vcmedia.vn/indexall.ashx",
			function(f){
				var b = f[0];
				var e = f[1];
				var c = f[4];
				var d = f[9];
				var m = f[7];
				var k = f[5];
				$("#ChungKhoan0").html(a.createChungKhoanString(b));
				$("#ChungKhoan1").html(a.createChungKhoanString(e));
				$("#ChungKhoan2").html(a.createChungKhoanString(c));
				$("#ChungKhoan3").html(a.createChungKhoanString(m));
				$("#ChungKhoan4").html(a.createChungKhoanString(d));
				$("#ChungKhoan5").html(a.createChungKhoanString(k))
			})
	},
	
	createChungKhoanString:function(b){
		var d;
		var a;
		if(typeof b.Percent=="undefined"){
			d=b.ChangePercent
		}else{
			d=b.Percent
		}
		
		if(typeof b.Index=="undefined"){
			a=b.Value
		}else{
			a=b.Index
		}
			
		var c ='<b class="indexer_header">'+b.Name+"</b>";
		var e=b.Change==0?"<span class='not_change'>▬</span><br />"+a+"&nbsp;&nbsp;<span class='not_change'>"+b.Change+"&nbsp;&nbsp;"+d+"%</span>":b.Change>0?"<span class='increase'>▲</span><br />"+a+"&nbsp;&nbsp;<span class='increase'>"+b.Change+"&nbsp;&nbsp;"+d+"%</span>":"<span class='decrease'>▼</span><br />"+a+"&nbsp;&nbsp;<span class='decrease'>"+b.Change+"&nbsp;&nbsp;"+d+"%</span>";
		
		return c+e
	}
};