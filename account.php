<?php 

include "connection.php";

$res = mysqli_query($connect, "SELECT * FROM `barang`");
$ress = mysqli_query($connect, "SELECT * FROM `barang`");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarCommerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/2be517dfe7.js" crossorigin="anonymous"></script>   
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
                    <a class="nav-link" aria-current="page" href="index.html">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="account.html">Account</a>
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
        <!-- Account -->
        <div class="card">
            <div class="card-header">
              Account
            </div>
            <div class="card-body">
                <h3>Account Name</h3>
                <h4>accountemail@students.unnes.ac.id</h4>
                <h5>Universitas Negeri Semarang</h5>
                <h5>Sekaran, Gunung Pati, Semarang City, Central Java 50229 </h5>
              <p class="card-text">This is System Management for CarCommerce Website Aplication</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddBackDrop">
                Add Car+
              </button>
            </div>
          </div>
          <br>
          <h4 style="text-align: center;">CarCommerce Data Managemet</h4>
      <table class="table container">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Series</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        	<?php 

    		while ($row = mysqli_fetch_array($res)) { 

    		?>
          <tr>
            <th scope="row">1</th>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['type_barang']; ?></td>
            <td>Rp <?php echo $row['harga']; ?></td>
            <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditBackDrop<?php echo $row['id_barang']; ?>">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteBackDrop">
                    Delete
                  </button>
            </td>
          </tr>
         
          <?php }; ?>
        </tbody>
      </table>

      <br>
          <h4 style="text-align: center;">Transaction History</h4>
      <table class="table container">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Series</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Payment Method</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Innova Toyota</td>
            <td>SUV</td>
            <td>Rp 150.000.000</td>
            <td> Cash </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>CIVIC Honda</td>
            <td>Sport</td>
            <td>Rp 150.000.000</td>
            <td>Credit</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Xpander Mitshubishi</td>
            <td>SUV</td>
            <td>Rp 150.000.000</td>
            <td>Debit</td>
          </tr>
        </tbody>
      </table>
      
<?php 

while ($rows = mysqli_fetch_array($ress)) { 

?>
      <!-- Modal -->
<div class="modal fade" id="EditBackDrop<?php echo $rows['id_barang']; ?>"   data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Car Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['id_barang']; ?>" name="id_barang" hidden>
                <div class="mb-3">
                  <label for="exampleInputSeries" class="form-label">Series</label>
                  <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['nama_barang']; ?>" name="nama_barang">
                  <div id="series" class="form-text">Car Series you want to edit</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputCategory" class="form-label">Category</label>
                    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['type_barang']; ?>" name="type_barang">
                    <div id="category" class="form-text">Car Category you want to edit</div>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputCategory" class="form-label">Price</label>
                    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?php echo $rows['harga']; ?>" name="harga">
                    <div id="price" class="form-text">Car Price you want to edit</div>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<?php }; ?>
  
<div class="modal fade" id="AddBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Car Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="exampleInputSeries" class="form-label">Series</label>
                  <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="series" class="form-text">Car Series you want to add</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputCategory" class="form-label">Category</label>
                    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="category" class="form-text">Car Category you want to add</div>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputCategory" class="form-label">Price</label>
                    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="price" class="form-text">Car Price you want to add</div>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="DeleteBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure want to delete these item
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>