<!DOCTYPE html>
<html>
<head>
	<title>Movies booking system</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		Cities=["Select A City","Delhi","Hyderabad"];
		dlhTheaters=["Select A Theater","Pvr Central","inox New City"];
		hydTheaters=["Select A Theater","satyam Ameerpet","inox HighTechCity"];
		pvrCentralMovies=["Select A Movie","Gravity In Hindi","Bang Bang"];
		inoxNewCityMovies=["Select A Movie","Avtar In Hindi","Krish3"];
		satyamAmeerpetMovies=["Select A Movie","Bahubali 2","Robot"];
		inoxHighTechCityMovies=["Select A Movie","Bahubali 1","Robot 2.0"];
		gInHAtPC=["select A Time","10:30AM","07:30PM"];
		bbAtPC=["select A Time","11:30AM","07:00PM"];
		aInHAtINC=["select A Time","10:00AM","11:30PM"];
		k3AtINC=["select A Time","10:30AM","07:30PM"];
		b2AtS=["select A Time","07:30AM","09:00PM"];
		r1Ats=["select A Time","09:30AM","08:30PM"];
		b1AtI=["select A Time","11:30AM","09:30PM"];
		r2Ati=["select A Time","10:30AM","10:00PM"];
		Classes=["Select A Class","Silver 150","Gold 250"];
		nos=["Select NO. Of Person","1","2","3","4","5"];

		var cfmCity=0;
		var cfmTheater=0;
		var cfmMovie=0;
		var cfmClass=0;
		var cfmTime=0;
		var cfmNos=0;

		function bodyLoad()
		{
			ctyList=document.getElementById("sltCity");
			for (var i =0;i<Cities.length;i++)
			{
				opt=document.createElement("option");
				opt.text=Cities[i];
				opt.value=Cities[i];
				ctyList.appendChild(opt); 
			}
		}
		function ctyChange()
		{
			theOption=document.getElementById("sltTheater");
			valOption="Select A City";
			switch(ctyList.value)
			{
				case "Select A City" :
										theOption.innerHTML="";
										cfmCity=0;	
										valueChange(valOption);
										break;
				case "Delhi" :
										theOption.innerHTML="";
										valueChange();
										for(var i=0;i<dlhTheaters.length;i++)
										{
											opt=document.createElement("option");
											opt.text=dlhTheaters[i];
											opt.value=dlhTheaters[i];
											theOption.appendChild(opt);
										}
										cfmCity=ctyList.value;	
										break;
				case "Hyderabad" :      
										theOption.innerHTML="";
										valueChange();
										for(var i=0;i<hydTheaters.length;i++)
										{
											opt=document.createElement("option");
											opt.text=hydTheaters[i];
											opt.value=hydTheaters[i];
											theOption.appendChild(opt);
										}
										cfmCity=ctyList.value;		
										break;
			}
			option="Select A City";
			clrAll(option);
		}
		function theChange()
		{
			movieOpt=document.getElementById("sltMovie");
			valOption="Select A Theater";
			switch(theOption.value)
			{
				case "Select A Theater" :
										movieOpt.innerHTML="";
										cfmTheater=0;
										valueChange();
										break;
				case "Pvr Central" :
										movieOpt.innerHTML="";
										valueChange();
										for(var i=0;i<pvrCentralMovies.length;i++)
										{
											opt=document.createElement("option");
											opt.text=pvrCentralMovies[i];
											opt.value=pvrCentralMovies[i];
											movieOpt.appendChild(opt);
										}
										cfmTheater=theOption.value;
										break;
				case "inox New City" :      
										movieOpt.innerHTML="";
										valueChange();
										for(var i=0;i<inoxNewCityMovies.length;i++)
										{
											opt=document.createElement("option");
											opt.text=inoxNewCityMovies[i];
											opt.value=inoxNewCityMovies[i];
											movieOpt.appendChild(opt);
										}
										cfmTheater=theOption.value;
										break;
				case "satyam Ameerpet" :
										movieOpt.innerHTML="";
										valueChange();
										for(var i=0;i<satyamAmeerpetMovies.length;i++)
										{
											opt=document.createElement("option");
											opt.text=satyamAmeerpetMovies[i];
											opt.value=satyamAmeerpetMovies[i];
											movieOpt.appendChild(opt);
										}
										cfmTheater=theOption.value;
										break;
				case "inox HighTechCity" :      
										movieOpt.innerHTML="";
										valueChange();
										for(var i=0;i<inoxHighTechCityMovies.length;i++)
										{
											opt=document.createElement("option");
											opt.text=inoxHighTechCityMovies[i];
											opt.value=inoxHighTechCityMovies[i];
											movieOpt.appendChild(opt);
										}
										cfmTheater=theOption.value;
										break;
			}
			picture();
			option="Select A Theater";
			clrAll(option);	
		}
		function movChange()
		{
			putTime=document.getElementById("sltTime");
			valOption="Select A Movie";
			switch(movieOpt.value)
			{
				case "Select A Movie" :
									putTime.innerHTML="";
									cfmMovie=0;
									picture();
									valueChange();
										break;
				case "Gravity In Hindi" :
									putTime.innerHTML="";
									valueChange();
										for(var i=0;i<gInHAtPC.length;i++)
										{
											opt=document.createElement("option");
											opt.text=gInHAtPC[i];
											opt.value=gInHAtPC[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Bang Bang" :
									putTime.innerHTML="";
									valueChange();
										for(var i=0;i<bbAtPC.length;i++)
										{
											opt=document.createElement("option");
											opt.text=bbAtPC[i];
											opt.value=bbAtPC[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Avtar In Hindi" :
									putTime.innerHTML="";
									valueChange();
									for(var i=0;i<aInHAtINC.length;i++)
										{
											opt=document.createElement("option");
											opt.text=aInHAtINC[i];
											opt.value=aInHAtINC[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Krish3" :
									putTime.innerHTML="";
									valueChange();
										for(var i=0;i<k3AtINC.length;i++)
										{
											opt=document.createElement("option");
											opt.text=k3AtINC[i];
											opt.value=k3AtINC[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Bahubali 2" :
									putTime.innerHTML="";
									valueChange();
									for(var i=0;i<b2AtS.length;i++)
										{
											opt=document.createElement("option");
											opt.text=b2AtS[i];
											opt.value=b2AtS[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Robot" :
									putTime.innerHTML="";
									valueChange();
									for(var i=0;i<r2Ati.length;i++)
										{
											opt=document.createElement("option");
											opt.text=r2Ati[i];
											opt.value=r2Ati[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Robot 2.0" :
									putTime.innerHTML="";
									valueChange();
										for(var i=0;i<r2Ati.length;i++)
										{
											opt=document.createElement("option");
											opt.text=r2Ati[i];
											opt.value=r2Ati[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
				case "Bahubali 1" :
									putTime.innerHTML="";
									valueChange();
										for(var i=0;i<b1AtI.length;i++)
										{
											opt=document.createElement("option");
											opt.text=b1AtI[i];
											opt.value=b1AtI[i];
											putTime.appendChild(opt);
										}
										cfmMovie=movieOpt.value;
										picture();
										break;
			}
			option="Select A Movie";
			clrAll(option);
		}
		function timChange()
		{
			putClass=document.getElementById("sltClass");
			valOption="select A Time";
			switch(putTime.value)
			{
				case "select A Time" : 
									putClass.innerHTML="";
									cfmTime=0;
									break;
				
				default : 
						putClass.innerHTML="";
						valueChange();
						for(var i=0;i<Classes.length;i++)
						{
							opt=document.createElement("option");
							opt.text=Classes[i];
							opt.value=Classes[i];
							putClass.appendChild(opt);			
						}
						cfmTime=putTime.value;
						shoTime=putTime.value;// store show time
					//	alert(shoTime);
						break;
			}
			option="select A Time";
			clrAll(option);
		}
		function clsChange()
		{
			putNos=document.getElementById("sltSeat");
			valOption="Select A Class";
			switch(putClass.value)
			{
				case "Select A Class" :
						putNos.innerHTML="";
						cfmClass=0;
						valueChange();
						break;
				default : 
						putNos.innerHTML="";
						valueChange();
						for(var i=0;i<nos.length;i++)
						{
							opt=document.createElement("option");
							opt.text=nos[i];
							opt.value=nos[i];
							putNos.appendChild(opt);			
						}
						cfmClass=putClass.value;
						showClass=putClass.value;// store class i.e, silver  or gold
						//alert(showClass);
						break;
			}
			option="select A Class";
			clrAll(option);
		}
		function nosChange()
		{
			seat=document.getElementById("sltSeat");
			valOption="Select NO. Of Person";
			switch(seat.value)
			{
				case "Select NO. Of Person" :
												//seatChange.innerHTML="";
												cfmNos=0;
												valueChange();
												break;
				default :

												valueChange();
												cfmNos=seat.value;
												break;
			}
		}
		function clrAll()
		{
			switch(option)
			{
				case "Select A City"     : document.getElementById("sltMovie").innerHTML="";//movieOpt.innerHTML=""; //??????????????????????
				case "Select A Theater"  : document.getElementById("sltTime").innerHTML="";				
				case "Select A Movie"    : document.getElementById("sltClass").innerHTML="";
				case "select A Time"     : document.getElementById("sltSeat").innerHTML="";
				case "Select A Class"    : document.getElementById("sltSeat").innerHTML=""; 
									   	   console.log("below  is data removing ......\n Successed");
										   break;
			}
		}
		function picture()
		{
			none=document.getElementById("none");
			Bahubali1=document.getElementById("bahubali1");
			Bahubali2=document.getElementById("bahubali2");
			Robot2=document.getElementById("robot2");
			Robot=document.getElementById("robot");
			Avtar=document.getElementById("Avtar");
			Bang=document.getElementById("Bang");
			Krish3=document.getElementById("Krish3");
			Gravity=document.getElementById("Gravity");
			switch(cfmMovie)
			{
				case 0 :  			console.log("select a  Movie");
									none.style.display="block";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Bang.style.display="none";
									Gravity.style.display="none";
									break;
				case "Gravity In Hindi" :	console.log("Gravity In Hindi");
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Bang.style.display="none";
									Gravity.style.display="block";
											break;
				case "Bang Bang" :  console.log("Bang Bang"); 
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="block";	
									break;
				case "Avtar In Hindi" : console.log("Avtar In Hindi"); 
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Avtar.style.display="block";
										break;
				case "Krish3" :     console.log("Krish3"); 
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Krish3.style.display="block";
									break;
				case "Bahubali 2" : console.log("Bahubali 2"); 
									none.style.display="none";
									Bahubali1.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Bahubali2.style.display="block";
									break;
				case "Robot" :  	console.log("Robot");
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Robot.style.display="block";
									break;
				case "Robot 2.0" :  console.log("Robot 2.0");
									none.style.display="none";
									Bahubali1.style.display="none";
									Bahubali2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Robot2.style.display="block";
									break;
				case "Bahubali 1" : console.log("Bahubali 1");	
									none.style.display="none";
									Bahubali2.style.display="none";
									Robot2.style.display="none";
									Robot.style.display="none";
									Avtar.style.display="none";
									Krish3.style.display="none";
									Gravity.style.display="none";
									Bang.style.display="none";	
									Bahubali1.style.display="block";
									break;
			}
		}
		//Calculation Area
		function valueChange()
		{
			switch(valOption)
			{
				case "Select A City" 			: cfmCity=0;
				case "Select A Theater"		    : cfmTheater=0;
				case "Select A Movie"           : cfmMovie=0;
				case "select A Time"  			: cfmTime=0;
				case "Select A Class"    		: cfmClass=0;
				case "Select NO. Of Person"     : cfmNos=0;
												 console.log("default data setup in prossess\n Successed");
												 break;
			}
		}
		function Calculation()
		{
			if(!(cfmCity))
				msg();
			else if (!(cfmTheater))
				msg();
			else if (!(cfmMovie))
				msg();
			else if (!(cfmTime))
				msg();
			else if (!(cfmClass))
				msg();
			else if (!(cfmTime))
				msg();			
			else if(!(cfmNos))
				msg();
			else
				{
					test=confirm("City :- "+cfmCity+"\nTheater :- "+cfmTheater+"\nMovie :- "+cfmMovie+"\nTime :- "+cfmTime+"\nClass :- "
										+cfmClass+"\nNo.OF Person  :- "+cfmNos);
					//console.log(test);
					if (test)
					{
						result=document.getElementById("table");
						create=document.getElementById("result");
						if (cfmClass=="Silver 150")
							create.value="150";
						else
							create.value="250";
						document.getElementById("main").style.display="none";
						document.getElementById("table").style.display="block";
						
					}
				}
		}
		function msg()
		{
			alert("Please select below option");
		}
	</script>
</head>
<body onload="bodyLoad()">
<div>
	<form>
		<table width="70%"align="right" id="main" style="display: block;">
			<caption>Booking System</caption>
			<tr align="center">
				<td>
					<select id="sltCity" onchange="ctyChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select id="sltTheater" onchange="theChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select id="sltMovie" onchange="movChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select id="sltTime" onchange="timChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select id="sltClass" onchange="clsChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select id="sltSeat" onchange="nosChange()"></select>
				</td>
			</tr>
			<tr align="center">
				<td>
					<input type="button" name="book"  value="Book Now" onclick="Calculation()">
				</td>
			</tr>
		</table>
	</form>
</div>
<div>
	<img src="images" width="30%" height="300px" alt="Please Select Movie" style="display: none;" id="none">
	<img src="images/bahubali2.jpg" width="30%" height="300px" alt="bahubali2" style="display: none;" id="bahubali2">
	<img src="images/bahubali1.jpg" width="30%" height="300px" alt="bahubali1" style="display: none;" id="bahubali1">
	<img src="images/Robot.jpg" width="30%" height="300px" alt="Robot" style="display: none;" id="robot">
	<img src="images/robot2.0.jpg" width="30%" height="300px" alt="robot2.0" style="display: none;" id="robot2">
	<img src="images/Gravity.jpg" width="30%" height="300px" alt="Gravity" style="display: none;" id="Gravity">
	<img src="images/Bang.jpg" width="30%" height="300px" alt="Bang Bang" style="display: none;" id="Bang">
	<img src="images/krish.jpg" width="30%" height="300px" alt="Krish3" style="display: none;" id="Krish3">
	<img src="images/Avtar.jpg" width="30%" height="300px" alt="Avtar" style="display: none;" id="Avtar">
</div>
<div>
	<form>
		<table id="table" style="display: none;">
			<tr align="center">
				<td>
					<input type="text" name="atm" id="result" readonly="readonly">
				</td>
			</tr>
			<tr align="center">
				<td>
					<input type="submit" name="pay" value="payNow" id="cfmresult">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>