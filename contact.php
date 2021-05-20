<!-- Including the php send mail file -->
<?php include("process.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title> El Pastelito. Formulario Contacto</title>
</head>

<body>
    <div class="container">
        <!-- Title -->
        <div class="row justify-content-center align-items-center">
            <h1 class="text-center text-info mt-3">Formulario de Contacto</h1>
        </div>
        <div class="row justify-content-center align-items-center ">
            <div class="col col-sm-9 col-md-9 col-lg-9 col-xl-6">
                <!-- Contact Form  -->
                <form action="contact.php" method="post" id="contactForm" onsubmit="return contactValidation()">
                    <div class="form-group text-info">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control validate" id="name" name="name" pattern="^[a-zA-Z ]*$"
                            placeholder="Su nombre..." required>
                        <div class="invalid-feedback" id="errorNombre"></div>
                    </div>
                    <div class="form-group  text-info">
                        <label for="email">Email</label>
                        <input type="text" class="form-control validate" id="email" name="email"
                            placeholder="Su email..." required>
                        <div class="invalid-feedback" id="errorEmail"></div>
                    </div>
                    <div class="form-group  text-info">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control validate" id="phone" name="phone"
                            placeholder="Su teléfono..." required>
                        <div class="invalid-feedback" id="errorPhone"></div>
                    </div>
                    <div class="form-group text-info">
                        <label for="subject">Asunto</label>
                        <select id="subject" class="form-control validate" name="subject" required>
                            <option selected value=""></option>
                            <option value="Tartas">Tartas</option>
                            <option value="Galletas">Galletas</option>
                            <option value="Cupcakes">Cupcakes</option>
                            <option value="Donuts">Donuts</option>
                        </select>
                        <div class="invalid-feedback" id="errorSubject"></div>
                    </div>
                    <div class="form-group  text-info">
                        <label for="rations">Número de Raciones</label>
                        <input type="text" class="form-control validate" id="rations" name="rations"
                            placeholder="Número de raciones..." required>
                        <div class="invalid-feedback" id="errorRations"></div>
                    </div>
                    <div class="form-group text-info">
                        <label for="cake">Masa Bizcocho</label>
                        <select id="cake" class="form-control validate" name="cake" required>
                            <option selected value=""></option>
                            <option value="Chocolate">Chocolate</option>
                            <option value="Carrot Cake">Carrot Cake</option>
                            <option value="Red Velvet">Red Velvet</option>
                            <option value="Limón">Limón</option>
                            <option value="Vainilla">Vainilla</option>
                        </select>
                        <div class="invalid-feedback" id="errorCake"></div>
                    </div>
                    <div class="form-group text-info">
                        <label for="cream">Relleno Crema</label>
                        <select id="cream" class="form-control validate" name="cream" required>
                            <option selected value=""></option>
                            <option value="Chocolate">Chocolate</option>
                            <option value="Vainilla">Vainilla</option>
                            <option value="Dulce de leche">Dulce de Leche</option>
                            <option value="Nata">Nata</option>
                            <option value="Limón">Limón</option>
                            <option value="Fresas">Fresas</option>
                            <option value="Fondant">Fondant</option>
                            <option value="Sin Azúcar">Sin Azúcar</option>
                            <option value="Gluten Free">Gluten Free</option>
                            <option value="Vegan">Vegan</option>
                        </select>
                        <div class="invalid-feedback" id="errorCake"></div>
                    </div>
                    <div class="form-group text-info">
                        <label for="textarea">Mensaje</label>
                        <textarea class="form-control validate" id=textarea name=textarea placeholder="Mensaje..."
                            required></textarea>
                        <div class="invalid-feedback" id="errorTextArea"></div>
                    </div>
                    <button type="submit" name="submit" class="col-3 btn btn-info btn-sm mb-3">Enviar</button>
                </form>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS and Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js "
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n "
            crossorigin="anonymous ">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js "
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo "
            crossorigin="anonymous ">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js "
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 "
            crossorigin="anonymous ">
        </script>
        <script src="https://use.fontawesome.com/6234b7c045.js"></script>
        <script src="javascript/contactValidation.js"></script>



</body>

</html>