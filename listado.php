<?php if ($_COOKIE['user']){

	$nombre_clase = 'php/cs_customers';
	spl_autoload_register(function ($nombre_clase) {
		include 'php/' . $nombre_clase . '.php';
	});

	$list = new cs_customers();
	$response = $list->getFullList();
    ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script src="js/custom.js"></script>
</head>
<script>

</script>
<body>
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="titleList">Listado de Asistentes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 tableList">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Socio</th>
                    <th scope="col">Congresos</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($r=0; $r< count($response); $r++){
                    ?> <tr>
                        <th scope="row"><?php echo $r+1; ?></th>
                        <td data="name"><?php echo $response[$r][1]; ?></td>
                        <td data="surname"><?php echo $response[$r][2]; ?></td>
                        <td data="email"><?php echo $response[$r][3]; ?></td>
                        <td data="address"><?php echo $response[$r][4]; ?></td>
                        <td data="origin"><?php echo $response[$r][5]; ?></td>
                        <td data="partner"><?php echo $response[$r][6]; ?></td>
                        <td data="meetings"><?php echo $response[$r][7]; ?></td>
                        <td>
                            <div id_customer="<?php echo $response[$r][0]; ?>" class="listActions delete"><i class="fa
                            fa-minus"
                                                                        aria-hidden="true"></i></div>
                            <div id_customer="<?php echo $response[$r][0]; ?>" class="listActions update"
                                 data-toggle="modal" data-target="#updateCustomer"><i class="fa
                            fa-gear" aria-hidden="true"></i></div>
                            <div id_customer="<?php echo $response[$r][0]; ?>" class="listActions email"><i class="fa
                            fa-envelope-o"
                                                                   aria-hidden="true"></i></div>
                        </td>
                        <td></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2 controlesAdmin">
            <button class="createUser"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
            <button class="deleteUser"><i class="fa fa-user-times" aria-hidden="true"></i></button>
            <button class="createCustomer" data-toggle="modal" data-target="#addCustomer"><i class="fa
            fa-address-card-o" aria-hidden="true"></i></button>
            <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="addCustomerLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Introducir datos de nuevo registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="create_regiter_form">
                                <div class="form-group ">
                                    <label for="nameCustomer">Nombre</label>
                                    <input type="text" class="form-control" id="nameCustomer" placeholder="Nombre"
                                           name="InputName">
                                </div>
                                <div class="form-group ">
                                    <label for="surnameCustomer">Apellido</label>
                                    <input type="text" class="form-control" id="surnameCustomer" placeholder="Appelido"
                                           name="InputSurname">
                                </div>
                                <div class="form-group ">
                                    <label for="emailCustomer">Email</label>
                                    <input type="email" class="form-control" id="emailCustomer" aria-describedby="emailHelp" placeholder="Email" name="InputEmail">
                                </div>
                                <div class="form-group ">
                                    <label for="addressCustomer">Direccion</label>
                                    <input type="text" class="form-control" id="addressCustomer" placeholder="Direccion"
                                           name="InputAddress">
                                </div>
                                <div class="form-group ">
                                    <label for="originCustomer">Origen</label>
                                    <input type="text" class="form-control" id="originCustomer" placeholder="Origen"
                                           name="InputOrigin">
                                </div>
                                <div class="form-group ">
                                    <select class="custom-select partner" id="partnerCustomer">
                                        <option selected disabled hidden>Socio</option>
                                        <option value="Y">Si</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <select class="custom-select meetings"
                                            multiple="multiple" id="meetingCustomer">
                                        <option value="Value A">Gijon</option>
                                        <option value="Value B">Madrid</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="createCustomer();">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="updateCustomer" tabindex="-1" role="dialog" aria-labelledby="addCustomerLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Introducir datos para actulaizar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="update_register_form">
                    <div class="form-group ">
                        <label for="nameCustomer">Nombre</label>
                        <input type="text" class="form-control" id="nameCustomer" placeholder="Nombre"
                               name="InputName">
                    </div>
                    <div class="form-group ">
                        <label for="surnameCustomer">Apellido</label>
                        <input type="text" class="form-control" id="surnameCustomer" placeholder="Appelido"
                               name="InputSurname">
                    </div>
                    <div class="form-group ">
                        <label for="emailCustomer">Email</label>
                        <input type="email" class="form-control" id="emailCustomer" aria-describedby="emailHelp" placeholder="Email" name="InputEmail">
                    </div>
                    <div class="form-group ">
                        <label for="addressCustomer">Direccion</label>
                        <input type="text" class="form-control" id="addressCustomer" placeholder="Direccion"
                               name="InputAddress">
                    </div>
                    <div class="form-group ">
                        <label for="originCustomer">Origen</label>
                        <input type="text" class="form-control" id="originCustomer" placeholder="Origen"
                               name="InputOrigin">
                    </div>
                    <div class="form-group ">
                        <select class="custom-select partner" id="partnerCustomer">
                            <option selected disabled hidden>Socio</option>
                            <option value="Y">Si</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <select class="custom-select meetings"
                                multiple="multiple" id="meetingCustomer">
                            <option value="Value A">Gijon</option>
                            <option value="Value B">Madrid</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="createCustomer();">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php } else {
	$loginURL="index.html";
	echo ("<script>location.href='$loginURL'</script>");
}