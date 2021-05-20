<!-- Including the main header -->
<?php include("header.php"); ?>

<!-- Page Content -->

    <div class="row mx-auto">
        <div class="col-lg-3 mt-2">
            <h2 class="lead py-2 text-center text-info ">Categorias de productos</h2>
            <div class="list-group">
                <a href="index.php" class="list-group-item">Todos los productos</a>

                <?php $sql = "SELECT * FROM CATEGORIAS"; 
              
			  $result = mysqli_query($mysqli, $sql);
			  while ($row_prod = mysqli_fetch_assoc($result))
			  { ?>
                <!-- This line will be executed as many times as there are categories in the database. -->
                <a href="index.php?id_cat=<?php echo $row_prod['ID_CATEGORIA']; ?>"
                    class="list-group-item"><?php echo $row_prod['NOMBRE']; ?></a>
                <?php } ?>
            </div>
        </div> <!-- /.col-lg-3 -->

        <div class="col-lg-9 mb-2 ">

            <div class="row">
                <?php
    if(isset($_REQUEST['id_cat'])){
        $sql_prod = "SELECT * FROM PRODUCTOS WHERE CATEGORIA_ID=".$_REQUEST['id_cat']; 
    }else{
        $sql_prod = "SELECT * FROM PRODUCTOS"; 
    }
    
    $resultado_prod = mysqli_query($mysqli, $sql_prod);
    if(mysqli_num_rows($resultado_prod)>0)
    {
        while ($row_prod = mysqli_fetch_assoc($resultado_prod))
        {
        ?>
                <div class="col-lg-4 col-md-6 my-2">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="./img/<?php echo $row_prod['URL_FOTO']; ?>"
                                alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <div class ="text-info"><?php echo $row_prod['NOMBRE']; ?></div>
                            </h4>
                            <h5><?php echo $row_prod['PRECIO']; ?>€</h5>
                            <p class="card-text"><?php echo $row_prod['DESCRIPCION']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info"
                            href="contact.php">Más Información</a>
                        </div>
                    </div>
                </div>
                <?php
        }
    }else{ ?>
                <div class="col-sm-12">
                    <h2 class="text-center text-info">No hay productos en esta categoría</h2>
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