var qnum='';
function qstdisplay()
{
qnum=document.getElementById("qno").value;
$(document).ready(function(){
$("#qstdisplaydiv").html(qnum);
var qformat='';
var i=0;
qformat="<table border=0>";
for(i;i<qnum;i++)
	{
	var mainqformat="<tr><td>Q."+(i+1)+") <input type='text' style='width:600px;' id=q"+(i+1)+" /><br>";
	var mainoptformat="&nbsp;&nbsp;&nbsp;<span style='padding-left:13%;'>A.&nbsp;<input type='text' id=q"+(i+1)+"a style='width:100px;'/>&nbsp;B.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"b />&nbsp;C.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"c />&nbsp;D.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"d /></span></tr></tr><tr><td><td></tr></tr><tr><td><td></tr>";
	qformat=qformat+mainqformat+mainoptformat;
	}
	qformat=qformat+"</table>";
$("#qstdisplaydiv").html(qformat);
});
}

function postthisquiz()
{
var tlimit=$("#tlimit").val();
var j=0;
var allqsts='';
var allopts='';
var flag1=0;
var opt1flag=0;
var opt2flag=0;
var opt3flag=0;
var opt4flag=0;
for(j=0;j<qnum;j++)
	{
	$(document).ready(function(){
	var tmpstr=$("#q"+(j+1)).val();
	if(tmpstr==false)
		flag1=1;
	var opt1=$("#q"+(j+1)+"a").val();
	if(opt1==false)
		opt1flag=1;
	var opt2=$("#q"+(j+1)+"b").val();
	if(opt2==false)
		opt2flag=1;
	var opt3=$("#q"+(j+1)+"c").val();
	if(opt3==false)
		opt3flag=1;
	var opt4=$("#q"+(j+1)+"d").val();
	if(opt4==false)
		opt4flag=1;
	allopts=allopts+opt1+"#"+opt2+"#"+opt3+"#"+opt4+"~";	
	allqsts=allqsts+tmpstr+"~";	
	});
	}
if(qnum==false || tlimit==false || flag1==1 || opt1flag==1 || opt2flag==1 || opt3flag==1 || opt4flag==1)
	alert("Fill Required Fields..Check Once...");
else
	{
	var ok=confirm("Are you Sure Post this Quiz");
	if(ok==true)
		{
		$("#postdiv").html("<font color=blue size=3>Sending<blink>...</blink></font>");
		$("#postdiv").html("<font color=green size=4>Quiz Submitted Successfully...</font>");
		$("#postdiv").css("visibility","show");
		$("#postdiv").hide();
		$("html, body").animate({ scrollTop: 0 }, 1000);
		$("#postdiv").show(3000);
		return false;
		}
	else
		{
		$("#postdiv").html("<font color=blue size=3>Sending<blink>...</blink></font>");
		$("#postdiv").html("<font color=red size=4>Quiz OOPS..</font>");
		$("#postdiv").css("visibility","show");
		$("#postdiv").hide();
		$("html, body").animate({ scrollTop: 0 }, 1000);
		$("#postdiv").show(3000);
		return false;
		}
	}
}

var k=new Array();
var i=0;
var answers='';
var mainanswers='';
var str;
var o,p=1;
var counterflag=0;
var attemptcount=0;
function ansthis(optid)
{
if (k.length==0)
{
attemptcount++;
k[i]=optid;
$("#"+optid).css({"background-color":"green"});
i=i+1;}
else
{
	o=optid.slice(0,optid.length-1);
	for (z=0;z<i;z++)
	{
		mainanswers='';
		str=k[z].slice(0,k[z].length-1); ///questino number
		if (str==o)
		{
			$("#"+k[z]).css({"background-color":"skyblue"});
			p=0;
		}
	}
	$("#"+optid).css({"background-color":"green"});
	if (p!=0)
		attemptcount++;p=1;
	k[z]=optid;
	i=i+1;
}
$("#dcount").html(attemptcount);
answers=answers+optid;
}

function quizsubmit()
{
var quizsubok=confirm("Are you Sure You Want to Submit Quiz...???");
if(quizsubok==true)
{
	alert(answers);
}
else
	{
	alert("Submission Cancelled");
	}
}

function countdowntime()
{
var d = new Date();
document.getElementById("demo").innerHTML = d.getTime();

}


function startquiz()
{



}



