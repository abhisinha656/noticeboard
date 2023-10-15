<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./style2.css">
</head>

<body>
    <aside id="sidebar">
        <div class="sidebar_content sidebar_head">
            <h1>Admin Page</h1>
        </div>

        <div class="sidebar_content sidebar_body">
            <nav class="side_navlinks">
                <ul>
                    <li><a href="user.php" active>Users</a></li>
                    <li><a href="notice.php">Notice</a></li>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add User
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="user.php" method = "post">
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="Name" aria-label="default input example" name="name">
  </div>
  <div class="mb-3">
    <input class="form-control" type="text" placeholder="Code" aria-label="default input example" name="code">
</div>
<div class="mb-3">
    <input class="form-control" type="password" placeholder="Password" aria-label="default input example" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>



<table class="table" style = "color:white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require('../conn/db.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"];
        $code = $_POST["code"];
        $password = $_POST["password"];
        
        if (empty($name) || empty($code) || empty($password)) {
            echo "enter";
        } else {
            $sql = "INSERT INTO `users` (`sno`, `name`, `code`, `password`) VALUES (NULL, '$name', '$code', '$password')";
            
            if(mysqli_query($conn, $sql)){
                echo " Recore Inserted";
            }
        }
    }

    $sql2 = "SELECT * FROM `users`";

    $result = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<th>".$row['sno']."</th>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['code']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td><a href=''>Delete</a></td>";
    echo "</tr>";
    }
    ?>
    
  </tbody>
</table>





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
