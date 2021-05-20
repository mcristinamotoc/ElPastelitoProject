<!-- Including the database connection file -->
<?php include("./connection.php"); ?>
<!-- Including the main header -->
<?php include("header.php"); ?>

<!-- Page Content -->

    <div class="row mx-auto">
        <div class="col-lg-3 ">
            <h2 class="lead py-2 text-center text-info">Categorias de productos</h2>
            <div class="list-group">
                <a href="index.php" class="list-group-item">Todos los productos</a>

                <?php $sql = "SELECT * FROM CATEGORIAS";         
			  $result = mysqli_query($mysqli, $sql);
			  while ($row = mysqli_fetch_assoc($result))
			  { ?>
                <!-- This line will be executed as many times as there are categories in the database. -->
                <a href="index.php?id_cat=<?php echo $row['ID_CATEGORIA']; ?>"
                    class="list-group-item"><?php echo $row['NOMBRE']; ?></a>
                <?php } ?>
            </div>
        </div> <!-- /.col-lg-3 -->
        <div class="col-lg-9 mb-2">
            <div class="row">
                <?php
    if(isset($_REQUEST['submit'])){
        $search= $_POST['search'];
        $query = "SELECT * FROM `PRODUCTOS` WHERE `NOMBRE` LIKE '%$search%' or `DESCRIPCION` LIKE '%$search%' or `PRECIO` LIKE '%$search%'"; 
    }else{
        $query = "SELECT * FROM PRODUCTOS"; 
    }   
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
        ?>
                <div class="col-lg-4 col-md-6 my-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="./img/<?php echo $row['URL_FOTO']; ?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?php echo $row['NOMBRE']; ?></a>
                            </h4>
                            <h5><?php echo $row['PRECIO']; ?>€</h5>
                            <p class="card-text"><?php echo $row['DESCRIPCION']; ?></p>

                        </div>
                        <div class="card-footer">
                        <a class="btn btn-info" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=mcristinamotoc%40gmail%2ecom&lc=ES&item_name=<?php echo $row['NOMBRE']; ?>&amount=<?php echo $row['PRECIO']; ?>&currency_code=EUR&button_subtype=services&no_note=0&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHostedGuest" target="_blank">Comprar Ahora</a>

                        </div>
                    </div>
                </div>
                <?php
        }
    }else{ ?>
                <div class="col-sm-12">
                    <h2 class = "text-center text-info" >No hay productos en esta categoría</h2>
                </div>
                <?php
    }
    ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
<?php include("footer.php"); ?>