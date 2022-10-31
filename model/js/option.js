  
 $(document).ready(function() {
      
    var retailer_id=localStorage.getItem("id"); 
    $("#retailer").val(retailer_id);  

    fetch('https://digithumb.tech/RetailerApi/getMemberRecord?retailer_id='+retailer_id)
    .then((response) => response.json())
    .then((json) => data(json));

    fetch('https://digithumb.tech/RetailerApi/getCoins?retailer_id='+retailer_id)
    .then((response) => response.json())
    .then((json) => mycoins(json));

    function data(json)
    {
      var data = Object.keys(json).map((key) => [Number(key), json[key]]);
      member_data = data['1']['1'];
      // console.log(member_data);
      var div_data = "";
      var count = 1;
      $.each(member_data, function (i, obj)
      {
        div_data += "<tr><td>"+count+".</td><td>#"+obj.id+"</td><td>"+obj.name+"</td><td>"+obj.mobile_number+"</td><td>"+obj.created_at+"</td></tr>";
        count++;
      });
      $('#student-list').html(div_data);
    }

    function mycoins(json)
    {
      var data = Object.keys(json).map((key) => [Number(key), json[key]]);
      coins_data = data['1']['1'];
      $("#balance").text(coins_data);
    }

});

    