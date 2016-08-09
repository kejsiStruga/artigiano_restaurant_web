var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
var xmlHttp;

if(window.ActiveXObject){ 
    try{
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(e){
        xmlHttp = false;
    }
}else{ 
    try{
        xmlHttp = new XMLHttpRequest();
    }catch(e){
        xmlHttp = false;
    }
}

if(!xmlHttp)
    alert("Cant create that object !")
else
    return xmlHttp;
}

function process(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
    food = encodeURIComponent(document.getElementById("userInput").value);
    xmlHttp.open("GET", "foodstore.php?food="+food,true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
}else{
    setTimeout('process()',1000);//cekaj 1s pa probaj opet
}
}

function handleServerResponse(){
if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){
        xmlResponse = xmlHttp.responseXML; //izvlaci se xml sto smo dobili
        xmlDocumentElement = xmlResponse.documentElement;
        message = xmlDocumentElement.firstChild.data;
        document.getElementById("underInput").innerHTML = message;
        setTimeout('process()', 1000);
    }else{
        alert('Something went wrong !');
    }
}
}
/*var xmlHttp = createXmlHttpRequestObject();
function createXmlHttpRequestObject()
{
var xmlHttp;

if(window.ActiveXObject)
{
	try{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}catch(e)
	{
		xmlHttp = false;
	}
}else{
	try{
		xmlHttp = new XMLHttpRequest();
	}catch(e){xmlHttp = false;
	}
}
}
if(!xmlHttp){
	alert("Snuk");
}else{
	return xmlHttp;
}


function process() //merr objektin q kemi krijuar dhe con objekt n server 
{
	if(xmlHttp.readyState==4||xmlHttp.readyState==0)
	{/*objekti xmlHttp ka disa gjendje dhe funxione buildIn 
ky objekt komunikon me serverin dhe ka gjendje te ndryshme , 
0 dhe 4 jan gjendje q tregojn se objekti eshte i lire dhe mund te komunikoje me 
serverin => meqe objekti esh gati t komunikoje => duhet te 
marrim vleren e asaj qe ka futur perdoruesi!
*/
/*food = encodeURIComponent(document.getElementById("userInput").value);
xmlHttp.open("GET", "foodstore.php?food="+food,true); //krijon requestin q do cojm tek serveri 
//"foodstore.php?food="+food => eshte URL-ja 
xml.onreadystatechange = handleServerResponse;
/*tani cojme requestin !  xmlHttp.send(null);		
	}else{
		setTimeout('process()',1000);
	}
}

//funxioni i fundit ! 

function handleServerResponse()
{
	if(xmlHttp.readyState==4)//dmth q ka mbaruar komunikimi dhe pgj eshte GATI{
		if(xmlHttp.status==200)
		{
			//200 n objektin tone tregon se
		//gjate komunikimit nuk kishte errore etj !
		//nqs komunikimi shkoi ok => kemi 1 objekt xml
		xmlResponse = xmlHttp.responseXML;
		xmlDocumentElement = xmlResponse.documentElement;//esh root-i i documentit
		message = xmlDocumentElement.fisrtChild.data;
		document.getElementById("underInput").innerHTML = '<span style="color: blue; ">'+message+'</span>';
		setTimeout('process()',1000);
		}else{
			alert("yep motherfucker , still you didnt get it right ;");
		}
		
}*/
