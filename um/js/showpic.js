$(function()
{
	var images=new Array();
		images[0]='img/0.jpg';
		images[1]='img/1.jpg';
		images[2]='img/2.jpg';
		images[3]='img/3.jpg';
		images[4]='img/4.jpg';
		images[5]='img/5.jpg';
		images[6]='img/6.jpg';
		images[7]='img/7.jpg';
	var texts=new Array();
		texts[0]='我能想到最浪漫的事，就是找一个下午，就那样坐着，看夕阳染红天边，看星星浮出水面';
		texts[1]='佛说，前世的五百次回眸，才能换回今世的擦肩而过';
		texts[2]='夕阳和海面，你笑的是那么清晰';
		texts[3]='在摩天轮的顶端，和你许下心愿';
		texts[4]='你，背包，海角，天涯';
		texts[5]='多少年后，我想在山下人迹稀少的小镇，清晨爬到高山颠顶，上午下山去集市买蔬菜水果。午后读一本书，晚上在杏花树下喝茶，聊天，直到月色和露水清凉。在梦中，鸟声清脆，树种崩裂，一起在树下疲累而眠。醒来时，我尚年少，你未老。';
		texts[6]='YOU ARE MY PRINCESS';
		texts[7]='WE ARE ON THE WAY......';
	var max=$(images).length;

		//$(".mp3").jmp3();
		// custom options
		$("#mysong").jmp3({
			backcolor: "000000",
			forecolor: "00ff00",
			width: 120,
			showdownload: "true",
			autoplay: "true",
		});

	if(max>0)
	{
		var ul=$('<ul id="imageOptions"></ul>');
		$(ul).appendTo($('#container'));
		var text=$('<div id="text"></div>');
		$(text).appendTo($('#container'));
		showImage("img/bg.jpg");
		LoadImage(0,max);

	/*$("ul#imageOptions li a").live('click',function(){
		var imageSource=$(this).children("img").attr("src");
		//console.log(imageSource);
		$("#loader").addClass("loading");
		$("h3").remove();

		showImage(imageSource);
		return false;
	});*/

}

function LoadImage(index,max)
{
	if(index<max)
	{
		var list=$('<li id="list'+index+'"><a href="#"><img src="" alt="image" /></a></li>').attr('class',"loading");
		$('#imageOptions').append(list);
		var curr=$("ul#imageOptions li#list"+index);
		var littleImage=$("ul#imageOptions li#list"+index+" img");

		$(littleImage).attr('src',images[index])
			.load(function(){
			$(littleImage).hide();
			$(curr).removeClass('loading');
			//$(curr).append(this);
			$(this).fadeIn('slow',function(){
				$(this).bind('click',function(){
					var imageSource=$(this).attr("src");
					//console.log(imageSource);
					$("#loader").addClass("loading");
					$("h3").remove();
					showImage(imageSource);
					showText(index);
				});
				LoadImage(index+1,max);
			});
		});
	}

}

function showImage(src)
{
	$("#loader img").fadeOut("slow").remove();

	var largeImage=new Image();
	$(largeImage).attr("src",src)
					.load(function()
					{
						$(largeImage).hide();
						$("#loader").removeClass("loading").append(largeImage);
						$(largeImage).fadeIn(5000);
						//$(largeImage).slideDown(2000);
					});
}

function showText(index)
{
	//$("#text").fadeOut("slow").remove();
	var str=texts[index];
	var wrt="";
	var ind=0;
	function OnTime(){
		wrt=str.substr(0,ind++);
		$("#text").text(wrt);
		if(ind>str.length){clearInterval(tm);}
	}
	tm=setInterval(OnTime,200);

}
});