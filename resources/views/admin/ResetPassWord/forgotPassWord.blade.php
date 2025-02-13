<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Subscription Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
  
}
html,body{
  height: 100vh;
  width: 100%;
  background-color:beige;
}
.wrapper{
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50% , -50%);
  background: #fff;
  width: 400px;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
}
.wrapper .top{
  display: flex;
  justify-content: center;
  align-items: center;
  background: #ffc107;
  height: 140px;
  position: relative;
  border-radius: 12px 12px 0 0;
}
.wrapper .top::before{
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  background: #ffc107;
  bottom: -10px;
  transform: rotate(45deg);
}
.wrapper .top i{
  font-size: 70px;
  color: #fff;
}
.wrapper .bottom{
  padding: 30px;
  word-spacing: -1px;
}
.wrapper .bottom .info{
  font-size: 20px;
  font-weight: 500;
}
.wrapper .bottom .input-box{
  height: 45px;
  margin: 15px 0 10px 0;
}
.wrapper form .input-box input{
  height: 100%;
  width: 100%;
  padding-left: 14px;
  outline: none;
  font-size: 18px;
  border-radius: 25px;
  transition: all 0.4s ease;

}
.wrapper .bottom input[type="text"]{
  border: 2px solid #ccc;
}
.wrapper .bottom input[type="text"]:focus,
.wrapper .bottom input[type="text"]:valid{
  border-color: #ffc107;
}
.wrapper .bottom input[type="submit"]{
  border: none;
  cursor: pointer;
  background: #ffc107;
  color: #fff;
  letter-spacing: 1px;
}
.wrapper .bottom input[type="submit"]:hover{
  background: #ffc107;
}
.wrapper .bottom .footer{
  font-size: 16px;
  margin-top: 12px;
}

.footer button.back , .footer button a{
  text-decoration: none;
  color: #fff;
  background-color: black;
}
.footer button.back i{
  margin-right: 12px;
}
.footer button.back:hover{
  text-decoration: none;
  color: #fff;
  background-color: black;
}
     </style>
   </head>
<body>
 
  <div class="wrapper">
    <div class="top">
      <i class="fas fa-envelope-open-text"></i>
    </div>
    <div class="bottom">
      <div class="info">
        Please enter your email<br>to search for your account.
      </div>
      <form action="{{ route('forgoot') }}" method="POST">
        @csrf
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter votre email" required>
        </div>
        <div class="input-box">
          <input type="submit" value="Envoyer">
        </div>
      </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  @if(session('message'))
  <script>
      Swal.fire({
          title: 'Alerte',
          text: '{{ session('message') }}',
          icon: 'warning',
          confirmButtonText: 'OK'
      });
  </script>
@endif
</body>
</html>