<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
            #toast-container {
              position: absolute;
              top: 30%;
              left: 50%;
              background-color: rgba(0, 0, 0, 0.7);
              color: #fff;
              padding: 10px 20px;
              border-radius: 5px;
              width:auto;
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
        <div class="login-box" style="height: 500px;">
            <form class="login-form" id="signForm">
                <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN UP</h3>

          <div id="toast-container" ></div>

                <div class="mb-3">
                    <label class="form-label">USERNAME</label>
                    <input class="form-control" type="text" name="username" placeholder="Email" autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="profession">PROFESSION</label>
                    <select class="form-control" id="profession" name="profession">
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Computer Engineering">Computer Engineering</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Service Engineering">Service Engineering</option>
                        <option value="Communication Engineering">Communication Engineering</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">PASSWORD</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>   
                <div class="mb-3">
                    <label class="form-label">CONFIRM PASSWORD</label>
                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                </div>                     
                <div class="mb-3">
                    <div class="utility"> 
                        <p class="semibold-text mb-0"><a href="page-login.php" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Login</a></p>
                    </div>
                </div>
                <div class="mb-3 btn-container d-grid">
                    <button  onclick="submitForm()" class="btn btn-primary btn-block" type="button"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN UP</button>
                    
                </div>
            </form> 
        </div>
    </section>

    <script>
  function submitForm(){
    var form = document.getElementById('signForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST','process/signup.php' , true);
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status <300){
 
        if(xhr.responseText == "Username already exists"){


            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
              toastContainer.style.display = 'none';

            }, 3000);

        }else{

            var toastContainer = document.getElementById('toast-container');
            toastContainer.textContent = xhr.responseText;
            toastContainer.style.display = 'block';
            setTimeout(function() {
              toastContainer.style.display = 'none';
              window.location.href ="page-signup.php"

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
</body>
</html>
