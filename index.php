
<?php 

include "connection.php";

$res = mysqli_query($connect, "SELECT * FROM `barang`");

?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarCommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CarCommerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">SUV</a></li>
                  <li><a class="dropdown-item" href="#">Sport</a></li>
                  <li><a class="dropdown-item" href="#">Sedan</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <main>
      <div class="container">          
        <div class="row">
            	<?php 

    		while ($row = mysqli_fetch_array($res)) { 

    		?>
            <div class="card col-md-4 m-5" style="width: 18rem;">
                <h5 class="card-header p-2"><?php echo $row['type_barang']; ?></h5>
              <div class="card-body p-3">
                <h5 class="card-title"><?php echo $row['nama_barang']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Rp <?php echo $row['harga']; ?></h6>
                <a href="buy_proses.php?id=<?php echo $row['id_barang']; ?>" type="button" class="btn btn-primary" >
                    Buy
                  </a>
              </div>
            </div>
            <?php }; ?>
            </div>
        </div>
      </main>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
