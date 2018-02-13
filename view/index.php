<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS and CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="view/styles/style.css">
    <link rel="shortcut icon" href="view/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="view/images/favicon.ico" type="image/x-icon">
    <title><?php echo $title.' '.$subTitle ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">Procedo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active content1" href="javascript:" target="#content1"><? echo $titleSection1 ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link content2" href="javascript:" target="#content2"><? echo $titleSection2 ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link content3" href="javascript:" target="#content3"><? echo $titleSection3 ?></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php if ($connected == '0') { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" style="margin-right:10px">Login</button>
          <?php } else { ?>
            <button type="button" class="btn btn-primary" style="margin-right:10px" id="btnLogout"><?php echo $logout ?></button>
          <?php } ?>
          <a href="http://wedbenger.com.br/procedo"> <img src="view/images/usa.ico" width="25" height="25"  alt="Usa"> </a>
          <a href="http://wedbenger.com.br/procedo/?lg=ptbr"> <img src="view/images/brasil.jpg" width="25" height="25"  alt="Brasil" style="margin-left:5px"></a>
        </form>
      </div>
    </nav>
    <div class="full-container full-container-top">
        <div class="container text-center container-top">
            <h1 class="display-3"><? echo $title ?></h1>
            <h2 class="display-4 sub-title"><? echo $subTitle ?></h2>
        </div>
    </div>
    <div class="full-container full-container-mid">
        <div class="container container-mid">
            <h2 class="display-4 sub-title-content" id="content1"><? echo $titleSection1 ?></h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                  <? echo $section1Content1 ?>
                </div>
                <div class="col-md-6">
                    <img src="view/images/image_ia1.png" class="img-fluid img-content img-content-right" alt="IA">
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top:20px;margin-bottom:30px;">
                <div class="col-md-6">
                  <img src="view/images/image_ia2.jpg" class="img-fluid img-content img-content-left" alt="IA">
                </div>
                <div class="col-md-6">
                  <? echo $section1Content2 ?>
              </div>
            </div>
        </div>
    </div>
    <div class="full-container full-container-mid2">
        <div class="container container-mid">
            <h2 class="display-4 sub-title-content" id="content2"><? echo $titleSection2 ?></h2>
            <hr>
            <div class="row text-center text-row" style="margin-bottom:20px;">
              <div class="col-md-12">
                <img src="view/images/image_ia3.jpg" class="img-fluid" alt="IA" align="center">
              </div>
            </div>
            <div class="row text-row">
            <? echo $section2Content1 ?>
            </div>
            <div class="row" style="margin: 30px 0px 50px 0px;">
                <div class="col-md-6">
                    <div class="div-relative img-content-left">
                      <h3><? echo $headerProblem1 ?></h3>
                      <ul class="list-group list-group-flush list-content2">
                        <? echo $listProblem1 ?>
                      </ul>
                    </div>
                </div>
                <div class="col-md-6" style="border-left:1px solid #404040">
                    <div class="div-relative img-content-right">
                      <h3><? echo $headerProblem2 ?></h3>
                      <ul class="list-group list-group-flush list-content2">
                        <? echo $listProblem2 ?>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="row text-row">
              <p class="lead">
              <? echo $section2Content2 ?>
              </p>
            </div>
        </div>
    </div>
    <div class="full-container full-container-mid">
        <div class="container container-mid">
            <h2 class="display-4 sub-title-content" id="content3"><? echo $titleSection3 ?></h2>
            <hr>
            <div class="row text-row">
              <p class="lead">
              <? echo $section3Content1 ?>
              </p>
            </div>
            <div class="row text-row">
              <div class="col-md-12">
                <form id="formContact" name="formContact" action="index.php?controller=message&action=message&lg=<?php echo $lg ?>" method="post" class="formInputs" >
                  <div class="alert message-form" role="alert">
                  </div>
                  <div class="form-group">
                    <label for="inputNickname"><? echo $nickname ?></label>
                    <input type="text" class="form-control" id="inputNickname" name="inputNickname" maxlength="30" placeholder="">
                    <div class="invalid-feedback">
                      <? echo $nicknameError ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputProblem"><? echo $question1 ?></label>
                    <select class="form-control" id="inputProblem" name="inputProblem">
                      <option value="" selected></option>
                      <option value="1"><? echo $yes ?></option>
                      <option value="2"><? echo $no ?></option>
                      <option value="3"><? echo $doubt ?></option>
                    </select>
                    <div class="invalid-feedback">
                      <? echo $question1Error ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSuggestion"><? echo $suggestion ?></label>
                    <textarea class="form-control" id="inputSuggestion" name="inputSuggestion" rows="3" maxlength="255"></textarea>
                    <div class="invalid-feedback">
                      <? echo $suggestionError ?>
                    </div>
                  </div>
                  <input type="hidden" id="lg" name="lg" value="<?php echo $lg ?>">
                  <button type="submit" class="btn btn-success"><? echo $submit ?></button>
                </form>
              </div>
            </div>
        </div>
    </div>

    <div class="full-container full-container-mid">
        <div class="container container-mid text-center">
            <button type="button" class="btn btn-primary" style="margin-bottom:20px;" id="getMessages"><? echo $seeMessages ?></button>
            <div class="row text-row" id="list-messages">
              
            </div>
        </div>
    </div>

    <div class="full-container full-container-footer">
        <div class="container container-footer text-center">
          © <?php echo $yearCop ?> Copyright: Lucas Martinez
        </div>
    </div>

    <div class="load-ajax"></div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formLogin" name="formLogin" action="index.php?controller=index&action=login&lg=<?php echo $lg ?>" method="post" class="formInputs" >
            <div class="modal-body">
                <div class="alert message-form" role="alert">
                </div>
                <div class="form-group">
                  <label for="inputUser"><? echo $user ?></label>
                  <input type="text" class="form-control" id="inputUser" name="inputUser" maxlength="30" placeholder='Usuário: "admin", senha: "secreta"'>
                  <div class="invalid-feedback">
                    <? echo $userError ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword"><? echo $password ?></label>
                  <input type="password" class="form-control" id="inputPassword" name="inputPassword" maxlength="30" placeholder="">
                  <div class="invalid-feedback">
                    <? echo $passwordError ?>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<!-- Includes JS -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="view/scripts/script.js"></script>