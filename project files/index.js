function listOptions(){
	document.getElementById("menu4").innerHTML = "<h2 class=\"page-header\"> Options</h2>"+
	"<a class = \" ol btn btn-primary\" onclick=\"wishList()\"> Favourites </a>"+
    "<a class = \"ol btn btn-primary\" onclick=\"orderList()\"> Order List</a>"+
	"<div id=\"m4\"> </div>";
}


function listTours(){
   var xmlhttp;

        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","index.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();
}   


function sortName()
{
   //alert("hello name");
	
	var s= document.getElementById("input").value;
	
	//document.getElementById("sortTitle").innerHTML= "Sort-By : Name <span class=\"caret\"></span>";
	
	var xmlhttp;
  
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","sort.php?sp=name&s="+s,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;

            }
        }
      
        xmlhttp.send();
   
}


function search()
{
   
	
	var s= document.getElementById("input").value;
   var xmlhttp;
  
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","search.php?s="+s,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;

            }
        }
      
        xmlhttp.send();

}


function sortPrice()
{
	//alert("hello price");
	
	
	var s= document.getElementById("input").value;
	
	//document.getElementById("sortTitle").innerHTML= "Sort-By : $ - $$$ <span class=\"caret\"></span>";
   var xmlhttp;
    
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","sort.php?sp=price&s="+s,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;

            }
        }
      
        xmlhttp.send();
   
}


function sortDate()
{
 
	var s= document.getElementById("input").value;
	
	
	//document.getElementById("sortTitle").innerHTML= "Sort-By : Date <span class=\"caret\"></span>";
   var xmlhttp;

        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","sort.php?sp=date&s="+s,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;

            }
        }
      
        xmlhttp.send();
		
		
   
}


function sortPricerev()
{
   
   var s= document.getElementById("input").value;
   
	//document.getElementById("sortTitle").innerHTML= "Sort-By : $$$ - $ <span class=\"caret\"></span>";
   var xmlhttp;

        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","sort.php?sp=pricerev&s="+s,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              
            document.getElementById("menu2").innerHTML = xmlhttp.responseText;

            }
        }
      
        xmlhttp.send();
   
}

function wish(i1)
{
	var id=i1;
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","addWishList.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
            }
        }
      
        xmlhttp.send();
   
}


function book(i1)
{
	var id=i1;
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","purchaseForm.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			
			str=xmlhttp.responseText;      
          
			if(str.indexOf("Sign")>0)
				alert(str);
			else
				document.getElementById("menu2").innerHTML=str;
            }
        }
      
        xmlhttp.send();
   
}


function fav_book(i1)
{
	var id=i1;
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","purchaseForm.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			
			str=xmlhttp.responseText;      
          
			if(str.indexOf("Sign")>0)
				alert(str);
			else
				document.getElementById("m4").innerHTML=str;
            }
        }
      
        xmlhttp.send();
   
}


function wishList()
{
	//var id=i1;
	//alert("wish list is..!!");
   var xmlhttp;
	var str;
    
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","WishList.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          
			if(str.indexOf("Sign")>0)
				alert(str);
			else
				document.getElementById("m4").innerHTML=str;
            }
            
        }
      
        xmlhttp.send();
   
}


function orderList()
{
	//var id=i1;
	//alert("order list is..!!");
   var xmlhttp;
	var str;
	    if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","orderList.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          
			if(str.indexOf("Sign")>0)
				alert(str);
			else
				document.getElementById("m4").innerHTML=str;
            }
            
        }
      
        xmlhttp.send();
   
}


function logout(){
	
		//var id=i1;
	//alert("order list is..!!");
	
	
	//alert("logged out");
   var xmlhttp;
	var str;
	    if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","logout.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          
				//alert(str);
				window.location.href = 'index.html';
			}
            
        }
      
        xmlhttp.send();
   
}
