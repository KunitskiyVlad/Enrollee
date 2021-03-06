<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="../css/registration.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="navbar-header">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <a class="navbar-brand" rel="home" href="home" title="Главная"><i class="fas fa-home"></i>На главную</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
		<div class="col-sm-3 col-md-3 pull-right">
        <form class="navbar-form" role="search" action="" method ="GET">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
        </form>
        </div>
<i class="far fa-user icon" data-toggle="modal" data-target="#ModalUser"></i>

    </div>

</nav>
<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-lebelledby="ModalUser" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describdby="emailHelp" placeholder="Email">
                        <span class="text-danger" id="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label for="pass">Пароль</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль">
                        <span class="text-danger" id="error_pass"></span>
                    </div>
                    <button type="button" class="btn btn-light"><a href="/registration">Регистрация</a></button>
                    <button type="button" class="btn btn-success" id='auth'>Отправить</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo include $content.'.php'?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../scripts/ajax.js"></script>
</body>
</html>