<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./style2.css">
</head>
<style>
.overflow {
  color: white;
  padding: 15px;
  width: 100%;
  height: 60vh;
  overflow: scroll;
  border: 1px solid #ccc;
}
.msg{
    display:flex;
    width:100%;
    background-color: black;
}
.msgbody{

    width: -webkit-fill-available;
    margin: 5px 2px;
}
.msgbody p{
    margin: auto ;
}

</style>
<body>
    <aside id="sidebar">
        <div class="sidebar_content sidebar_head">
            <h1>Admin page</h1>
        </div>

        <div class="sidebar_content sidebar_body">
            <nav class="side_navlinks">
                <ul>
                    <li><a href="user.php">Users</a></li>
                    <li><a href="notice.php" active>Notice</a></li>
                </ul>
            </nav>
        </div>

        <div class="sidebar_content sidebar_foot">
            <p>
                &#169;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &#160;JavaScript Sidebar.
            </p>
        </div>
    </aside>
    <div class="sidebar_toggler">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container">

    <h2>Notice</h2>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Notice
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="notice.php" method="post">
      <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Add Notice</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notice"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>


    <div class="overflow">
    <?php
        require('../conn/db.php');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $notice = $_POST["notice"];
            
            if (empty($notice)) {
                echo "enter";
            } else {
                $sql2 = "INSERT INTO `message` (`Sno`, `msg`, `msgfor`, `date`) VALUES (NULL, '$notice', '2', current_timestamp())";
                if(mysqli_query($conn, $sql2)){
                    echo " Recore Inserted";
                }
            }
        }



        $sql = "SELECT * FROM `message`";
    
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='msg'>";
            echo"<div class='msgbody'>";
            echo "<p>".$row['msg']."</p>";
            echo "<p><i>".$row['date']."</i></p>";
            echo "</div>";
            echo"<div class='action'>";
            echo "<p><a href=''>Delete</a></p>";
            echo "</div>";
            echo"</div>";
            echo"<hr>";
        }
    ?>
    
    </div>







    </div>
    <!--====== JavaScript ======-->
    <script src="./main.js"></script>
</body>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LLWL5N9CSM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-LLWL5N9CSM');
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
