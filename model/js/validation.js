$(document).ready(function(){
    var id=localStorage.getItem("id");    
    if(id == null)
    {
        window.open('/html/loginpage.html','_self')
    }
   


})