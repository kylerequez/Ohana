<!doctype html>
<html lang="en">
  <head>

   <!-- META TAGS -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
   <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
   <meta name="keywords" content="Kennel Business, French Bulldogs">
   <!-- END OF META TAGS -->

    <title> ERROR PAGE </title>

    <!-- Web Icon -->
    <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

    <!-- Custom styles-->
    <link rel="stylesheet" href="/Ohana/src/css/Error.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">

    
  </head>
  <body>

    <div class="text">
        <div>ERROR</div>
        <hr>
        <?php
        if(isset($_SESSION["msg"])) echo $_SESSION["msg"];
        unset($_SESSION["msg"])
        ?>
    </div>
    <a href="/" class="btn continue"> BACK TO HOME PAGE </a>
      <div class="frenchie">
        <img src="/OhavaV2/src/images/frenchierror.png" alt="" class="src">
      </div>
    
    <!-- START OF JAVASCRIPT -->
    <script> 
    document.addEventListener("DOMContentLoaded",function(){
  
        var body=document.body;
        setInterval(createStar,100);
        function createStar(){
            var right=Math.random()*500;
            var top=Math.random()*screen.height;
            var star=document.createElement("div");
        star.classList.add("star")
        body.appendChild(star);
        setInterval(runStar,10);
            star.style.top=top+"px";
        function runStar(){
            if(right>=screen.width){
            star.remove();
            }
            right+=3;
            star.style.right=right+"px";
        }
        } 
        })
    </script>
    <!-- END OF JAVA SCRIPT -->

    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous">
    </script>

  </body>
</html>