<!--  -->

<html lang="en">
<head>
  <title>Welcome to GC University</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="newproject.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<body style=" height: 50px; background-size: cover; ">


	<nav st class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Goverment College University</a>
    <div class="">
   
   </div>
  </div>
</nav>
    <div class="container"><br>
      <div class="row card" style="background-color: rgba(245, 245, 245, 1);">
        <div class="col-md-12">

          <div class="row">
            <div class="col-md-1"></div>
             <div class="col-md-10" id="myForm">
              
             </div>

             <div>
              
             </div>
          </div>
        </div>  
      </div>
    </div>
  <?php 
  $link = mysqli_connect("localhost", "root", "", "ahwc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
      // Attempt get query execution
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
    print_r($result);
    exit();
    // print_r(mysqli_fetch_array($result));
    // Close connection
mysqli_close($link);
}
    echo "<table class='table table-bordered table-dark'>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>password</th>
    <th>Education</th>
    <th>URL</th>
    <th>Address</th>

    
    </tr>";

     $sql = "SELECT * FROM users";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
          echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['education'] . "</td>";
              echo "<td>" . $row['url'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
   
  ?>

    <script>
  $(document).ready(function(){
       addForm();
    });
    
    function createUser() {
        // getting fields value
        var name = $('#text').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var pwd = $('#pwd').val();
        var education = $('#education').val();
        var date = $('.mydate').val();
        var url = $('.url').val();
        var desc = $('.desc').val();
        // checking if all fields are empty
      if(name == '' && email == '' && phone == '' && pwd == '' && education == '' && date == '' && url == '' && desc == ''){
        $('#text').css('border-color','red');
        $('#email').css('border-color','red');
        $('#phone').css('border-color','red');
        $('#pwd').css('border-color','red');
        $('.education').css('border-color','red');
        $('.mydate').css('border-color','red');
        $('.url').css('border-color','red');
        $('.desc').css('border-color','red');
      }

        // checking one by one input field
        else if(email == ''){
           $('#email').css('border-color','green');
        }
        else if(name == ''){
        $('#text').css('border-color','red');
        }
        else if(pwd == ''){
        $('#pwd').css('border-color','red');
        }
        else if(phone == ''){
        $('#phone').css('border-color','red');
        }
        else if(education == ''){
        $('.education').css('border-color','red');
        $('.mydate').css('border-color','red');
        $('.url').css('border-color','red');
        $('.desc').css('border-color','red');
        }
        else if(date == ''){
        $('.mydate').css('border-color','red');
        $('.url').css('border-color','red');
        $('.desc').css('border-color','red');
        }
        else if(url == ''){
        $('.url').css('border-color','red');
        }
        else if(desc == ''){
        $('.desc').css('border-color','red');
        }

       // If all fields are not empty then submit data to Database


      else{
       
        $.ajax({
          url:"insertUser.php",    //the page containing php script
          type: "post",    //request type,
          data: {"name": name, "email": email, "phone": phone,"password":pwd,"education":education,"dateof":date,"url":url,"description":desc },
          success:function(result){
              console.log(result);
               alert('success!');
          }
      });
     }
    
        
  }



    function validate(ali){
      var elementval  =  ali.value;
      if(elementval != ''){
        // debugger
        $(ali).css('border-color','green');
      }else{
           $(ali).css('border-color','yellow');
      }
    
    }

     function getData(){
      var searcFor = $('#searchBtn').val();
        $.ajax({
            url:"searchData.php",    //the page containing php script
            type: "post",    //request type,
            data: {"searchFor": searcFor},
            success:function(result){
                $('#result').text('Result:');
                // debugger
                if(result.length > 0){
                  $('.form_hide').html(result);
                }else{
                  $('.form_hide').html('No Record Found');
                }
                
                console.log((result));
            }
        });

    }
    function addForm(){
      $('#myForm').html(' <h4 id="result">Register Yourself Here</h4> <form class="form-horizontal  form_hide" style="padding: 20px; margin-left: 0px;"> <div class="form-group"> <label class="control-label" for="email">Your Name:</label> <div class=""> <input type="text" onfocusout="validate(this)" required="required" class="form-control" id="text" placeholder="Enter name" name="name"> </div> </div> <div class="form-group"> <label class="control-label" for="pwd">Your Email:</label> <div class=""> <input type="email" onfocusout="validate(this)" required="" class="form-control" id="email" placeholder="Enter email" name="email"> </div> </div> <div class="form-group"> <label class="control-label" for="pwd">Your Password:</label> <div class=""> <input type="password" onfocusout="validate(this)" required="" class="form-control" id="pwd" placeholder="Enter password" name="pwd"> </div> <label class="control-label" for="phone">Your Phone:</label> <div class=""> <input type="number" onfocusout="validate(this)" required="required" class="form-control" id="phone" placeholder="Enter Phone" name="phone"> </div> <div> <div> <label>Select Your Education</label><br></div> <select class="form-control education" name="edu" id="education" onfocusout="validate(this)"> <option value="">--Select--</option> <option value="Matric">MATRIC</option> <option value="ICS">ICS</option> <option value="BSIT">BSIT</option> </select> </div> <div> <div> <label>Select Your Date of Birth:</label><br></div> <input class="form-control mydate" type="Date" onfocusout="validate(this)" name="Date"> </div> <div> <div> <label>Select Your Gender:</label><br></div> <div class="form-control" onfocusout="validate(this" )=""> <input type="radio" checked="" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female </div> </div> <div> <label>Select Your Favourite Hobbies (Optional):</label><br> <div class="form-control"> <input type="checkbox" name="myHobbies" id="myHobbies" onchange="borderGreen()" required=""> Reading <input type="checkbox" name="myHobbies" id="myWrite" onchange="borderGreen()" required=""> Writting <input type="checkbox" name="myHobbies" id="myWatch" onchange="borderGreen()" required=""> Watching </div> </div><br> <div> <div>URL:</div> <input class="form-control url" type="text" onfocusout="validate(this)" placeholder="https://www.google.com" name="Date"> </div> <div> <label>Address:</label><br> <textarea onfocusout="validate(this)" class="form-control desc"></textarea> </div> </div> <div class="form-group"> <div class=""> <button type="submit" onclick="createUser()" class="btn btn-primary">Submit</button> </div> </div> </form> ');
    }



    function getDBtable(){
      $.ajax({
            url:"getData.php",    //the page containing php script
            type: "post",    //request type,
            // data: {"searchFor": searcFor},
            success:function(result){
                if(result.length > 0){
                  $('#myForm').html(result);
                }else{
                  $('#myForm').html('No Record Found');
                }
                console.log((result));
            }
        });
    }
</script>
</body>
</html>
