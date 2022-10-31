$(document).ready(function(){
 
      $('#dashboard').click(function(){
        window.open('/html/dashboard.html','_self')
      });

      $('#add-student').click(function(){
        window.open('/html/savefinger.html','_self')
      });

      $('#change-password').click(function(){
        window.open('/html/change-password.html','_self')
      });

      $('#logout').click(function(){
        localStorage.clear();
        window.open('/html/loginpage.html','_self')
      });
       var id=localStorage.getItem("id");
       $('#retailer_id').val(id);


    $('#regform').on('submit', function (e) {
        e.preventDefault();
        var name = $(document).find("#name").val();
        if(name == "")
        {
          alert("Student name is required!");
        }
        else
        {
          var formdata = new FormData(this);
          $.ajax({
            type: 'post',
            url: 'https://digithumb.tech/RetailerApi/createstudent',
            data: $('#regform').serialize(),
            success: function (res) 
            {
                if(res['status'] == "1")
                {
                  alert("Student Record Added Successfully!");
                  window.location.reload();
                }
                else if(res['status'] == "2")
                {
                  alert("Student Record already exists!");
                }
                else if(res['status'] == "3")
                {
                  alert("Unable to create student record! Try again later");
                }
                else if(res['status'] == "4")
                {
                  alert("Insufficient balance! Please contact your admin to add coins!");
                }
                else
                {
                  alert("Something is wrong! Try again later");
                }
            }
          });
        }
    });    
});
    
    