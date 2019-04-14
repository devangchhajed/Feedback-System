function setRandomBackground(){
    var x = Math.floor((Math.random() * 10) + 1);
	var bgcode;
	switch(x){
		case 1:
			bgcode = "linear-gradient(#A770EF,#CF8BF3,#FDB99B)";
			break;
		case 2:
			bgcode = "linear-gradient(#76b852,#8DC26F)";
			break;
		case 3:
			bgcode = "linear-gradient(#FEAC5E,#C779D0,#4BC0C8)";
			break;
		case 4:
			bgcode = "linear-gradient(#6a3093,#a044ff)";
			break;
		case 5:
			bgcode = "linear-gradient(#457fca,#5691c8)";
			break;
		case 6:
			bgcode = "linear-gradient(#B24592,#F15F79)";
			break;
		case 7:
			bgcode = "linear-gradient(#c2e59c,#64b3f4)";
			break;
		case 8:
			bgcode = "linear-gradient(#00C9FF,#92FE9D)";
			break;
		case 9:
			bgcode = "linear-gradient(#fc00ff,#00dbde)";
			break;
		case 10:
			bgcode = "linear-gradient(#8e9eab,#eef2f3)";
			break;
			
	}

	 $("body").css("background", bgcode).show("slow");
}
//setRandomBackground();