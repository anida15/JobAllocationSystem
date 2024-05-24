<?php
include 'db.php';

session_start(); 
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login</title>

    <style>
            #toast-container {
              position: absolute;
              top: 30%;
              left: 50%;
              background-color: rgba(0, 0, 0, 0.7);
              color: #fff;
              padding: 10px 20px;
              border-radius: 5px;
              display: none;
              transform: translate(-50%,-50%);
            }

        </style>


  </head>
  <body>


    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    <section class="login-content"> 
      <div class="login-box">
        <form class="login-form" id ="loginForm" >
          
            <div id="toast-container" ></div>
                 
          <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
          <span style="color:red"><?php echo $error; ?></span>
          <div class="mb-3">
            <label class="form-label">USERNAME</label>
            <input class="form-control" type="text" name="username" placeholder="Email" autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="mb-3">
            <div class="utility">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="page-signup.php" data-toggle="flip">Create New Account ?</a></p>
            </div>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button onclick="submitForm()" class="btn btn-primary btn-block" type="button"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>


    <script>
  function submitForm(){
    var form = document.getElementById('loginForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST','process/login.php' , true);
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status <300){

            if (xhr.responseText =="sucess"){
              
            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
              toastContainer.style.display = 'none';
              window.location.href ="dashboard.php"
            }, 3000);

            }else{

            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
              toastContainer.style.display = 'none';
            }, 3000);
            }

      }else{
        console.error("Request failed");

      }
    }
    xhr.send(formData);

  }
    </script>











    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
 
    </script>
  </body>
</html>
