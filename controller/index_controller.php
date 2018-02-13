<?php
require_once('model/connection/connection.php');
require_once('model/user_model.php');

  class IndexController {
    //show the landing page
    public function index() {
        //start session
        session_start();

        //set the correct language
        if (isset($_GET['lg']) && $_GET['lg'] == 'ptbr') {
            //set the correct text based on the language
            $lg = $_GET['lg'];
            $title = 'Inteligência Artificial';
            $subTitle = 'O futuro é seguro?'; 
            
            //titles
            $titleSection1 = 'Introdução';
            $titleSection2 = 'O Problema';
            $titleSection3 = 'Contato';

            //section1
            $section1Content1 = '<p class="lead"> A <strong>Inteligência Artifical</strong> é um assunto que vem sendo muito discutido nos ultimos tempos e grandes avanços nesta área estão sendo concretizados.</p> <p class="lead"> Um grande número de experts no assunto acredita que durante o século 21, os humanos poderão criar máquinas mais inteligentes do que eles mesmo. A concretização desta previsão pode significar um grande avanço para a humanidade, mas também <strong>grandes riscos.</strong></p>';
            $section1Content2 = '<p class="lead">Um desses riscos pode ser a continuidade da dominação do planeta. Os humanos se tornaram a espécie dominante do planeta devido a sua <strong>inteligência</strong>, máquinas mais inteligentes podem se tornar um fator muito perigoso para nós. </p><p class="lead">Mas como para todo problema existe uma solução, a prevenção e a pesquisa de métodos que tornem a inteligência artifical mais segura devem ser realizadas para que no futuro a inteligência das máquinas ainda possa ser <strong>controlada</strong>.</p>';
            
            //section2
            $section2Content1 = '<p class="lead">A ideia de máquinas inteligentes assumindo o controle do mundo não é nova, podemos ver isso em diversos filmes, como por exemplo "O Exterminador do Futuro". Mas e na vida real, isto pode realmente acontecer?</p><p class="lead">Alguns estudos mostram que a chance de um acontecimento catastrófico causado por maquinas inteligentes dentro de 100 anos está entre <strong>1 e 10%</Strong>. Se esta porcentagem estiver correta, a possibilidade de um acontecimento desse deve ser levada em conta e medidas preventivas devem ser aplicadas o mais rápido possível. </p><p class="lead">Mesmo levando em conta todas essas informações, atualmente o trabalho para tornar a inteligência artificial mais segura não é amplamente desenvolvido. Estimasse que menos de <strong>100</strong> pessoas em todo o mundo estão realizando este trabalho. Mas porque isso acontece? Pode se dizer que se deve a ser uma área arriscada e nova ou por ser um problema que pode nem chegar acontecer. Veremos abaixo os motivos para acreditar e não acreditar que este é um problema atual.</p>';
            $headerProblem1 = 'Motivos para acreditar';
            $headerProblem2 = 'Motivos para não acreditar';

            $listProblem1 = '<li class="list-group-item">O progesso recente, indica que o impacto pela inteligência artificial deve ser <strong>rápido</strong>.</li><li class="list-group-item">Uma pesquisa com 100 dos mais renomados pesquisadores da ciência da computação, sugere que existe uma chance alta de que em menos de 50 anos, robôs poderão realizar a maioria das <strong>profissôes humanas.</strong></li><li class="list-group-item">Aos poucos, o <strong>investimento</strong> na questão da segurança da inteligência artificial vem aumentando ano a ano.</li>';
            $listProblem2 = '<li class="list-group-item">Nem todo mundo acredita que existe um problema. Por exemplo, Algumas pessoas acreditam que mesmo muito inteligentes as máquinas <strong>não</strong> terão a oportunidade de causar destruição em escala global.</li><li class="list-group-item">Ainda é muito <strong>cedo</strong> para se concentrar neste problema, pois os métodos futuros podem ser totalmente diferente dos atuais.</li>';

            $section2Content2 = 'Como descrito, podemos perceber que ainda existem algumas divergências na questão do foco atual na segurança da Inteligência Artificial. Mas como descrito, os investimentos nesta área estão crescendo e com poucas pessoas trabalhando nessa questão, essa área pode ser muito promissora para pessoas que gostam de se arriscar em novos desafios e que querem a garantia de um futuro mais <strong>seguro</strong>.';
            
            //section3
            $section3Content1 = 'E para você? Qual sua opnião sobre este assunto? Deixe abaixo o seu comentário ou sugestão. <strong>Juntos nós pensamos melhor!</strong>';
            $nickname = 'Apelido';
            $question1 = 'Você considera a segurança da Inteligência Artificial um problema atual?';
            $suggestion = 'Comentário/Sugestão';
            $yes = 'Sim';
            $no = 'Não';
            $doubt = 'Não sei';
            $submit = 'Enviar';

            $nicknameError = 'Digite um apelido válido por favor.';
            $question1Error = 'Selecione uma opção por favor';
            $suggestionError = 'Digite uma mensagem por favor.';

            //section4
            $seeMessages = 'Ver Mensagens';

            //login
            $user = 'Usuário';
            $password = 'Senha';
            $userError = 'Digite um usuário válido';
            $passwordError = 'Digite uma senha válida';
            $logout = 'Sair';

        } else {
            $lg = '';
            $title = 'Artificial Intelligence';
            $subTitle = 'Is the future safe?'; 
            
            //titles
            $titleSection1 = 'Introduction';
            $titleSection2 = 'The Problem';
            $titleSection3 = 'Contact';

            //section1
            $section1Content1 = '<p class="lead">The <strong>Artificial Intelligence</strong> is a subject that is being discussed in the last times and great advances in this field are being implemented.</p> <p class="lead"> A great number of experts on this subject believes that during the 21 century, the humans could create machines more intelligent than themselves. The concretization of this prediction can mean a great advance for the humans, but also a <strong> great risk </strong>.</p>';
            $section1Content2 = '<p class="lead">One of these risks can be the continuity of the planet´s domination. Humans have become the dominant specie of planet by their <strong>intelligence</strong>, machines more intelligent could be a fact much dangerous for us.</p><p class="lead">But for all problems, exist a solution, the prevention and research of methods that make the artificial intelligence more safe must be realized for in the future the machines\' intelligente can still <strong>controlled</strong>.</p>';
            
            //section2
            $section2Content1 = '<p class="lead">The idea of machines intelligent taking the control of the world is not new, we can see in many movies, like "The Terminator". But in real life? Is it can happens?</p><p class="lead">Some studies show that the chance of a catastrophic event by intelligent machines within 100 years is between <strong>1 and 10%</strong>. If this percentage is correct, the possibility of a event must be think and preventive measures should be applied rapidly.</p><p class="lead">Even with these informations, currently the work to make the artificial intelligence more safe is not widely deployed. Esteemed at least <strong>100</strong> people are working in this subject. But why this happens? Can be say its happen because is a risky area and new or because its a problem that can not happen. Let is see below the reasons to believe and not believe that is a current problem.</p>';
            $headerProblem1 = 'Reasons to believe';
            $headerProblem2 = 'Reasons to not believe';

            $listProblem1 = '<li class="list-group-item">The recent progress, indicates that the impact by the artificial intelligence should be <strong>fast</strong>.</li><li class="list-group-item">A research with 100 of more renowned researchers of computer science, suggest that exists a high chance that in less than 50 year robots can be do the most of <strong>humans professions</strong>.</li><li class="list-group-item">Slowly the <strong>investments</strong> in security of artificial intelligence have been increasing year by year.</li>';
            $listProblem2 = '<li class="list-group-item">Not everyone believes that exists a problem. By example, some people believes that even very intelligents, the machines <strong>not</strong> will has the opportunity to cause a global destruction.</li><li class="list-group-item">Still to <strong>early</strong> to focus in this problem because the future methods can be totally different from the current</li>';

            $section2Content2 = 'How described, we can see that still exists some divergences about the current focus in the artificial intelligence. But the investments in this field are increasing and with few people working, this field can be promising for people that like take risks e that want the guarantee of a <strong>future safe</strong>.';
            
            //section3
            $section3Content1 = 'And for you? What is your opinion about this topic? Write you comment ou suggestion. <strong>Together we think better!</strong>';
            $nickname = 'Nickname';
            $question1 = 'Do you consider the  Artificial Intelligence´s security a current problem?';
            $suggestion = 'Comment/Suggest';
            $yes = 'Yes';
            $no = 'No';
            $doubt = 'I Don´t Know';
            $submit = 'Submit';

            $nicknameError = 'Enter a valid nickname please.';
            $question1Error = 'Select one option please.';
            $suggestionError = 'Enter a valid suggestion please.';

            //section4
            $seeMessages = 'See Messages';

            //login
            $user = 'User';
            $password = 'Password';
            $userError = 'Enter a valid user.';
            $passwordError = 'Enter a valid password.';
            $logout = 'Logout';
        }

        //get current year
        $yearCop = date("Y");
        $connected = '0';
        //check the user has logged
        if(isset($_SESSION['connected'])) {
             $connected = '1';
        }
      
	    require_once('view/index.php');
    }

    //function to make login
    public function login() {
        //start session
        session_start();

        //set the correct text based on the language
        if (isset($_GET['lg']) && $_GET['lg'] == 'ptbr') {
            $errorMessage = 'Login ou Senha inválida.';
        } else {
            $errorMessage = 'User or password wrong.';
        }
        $error = 0;

        //check if the all parameters has been received
        if (!isset($_POST['inputUser']) || !isset($_POST['inputPassword'])) {
            $error = 1;
        }
        //user: "admin"
        //password: "secreta"
        $inputUser = $_POST['inputUser'];
        $inputPassword = $_POST['inputPassword'];

        //check the length of the inputs
        if ((strlen($inputUser) == 0 || strlen($inputUser) > 30) || (strlen($inputPassword) == 0 || strlen($inputPassword) > 30)) {
            $error = 1;
        }

        //if not have error
        if ($error == 0) {
             //creater user and make the login
             $user = new User();
             $error = $user->Login($inputUser,$inputPassword);
             //if the login was successful, reload the page
             if ($error == 0) {
                 //save the session
                $_SESSION['connected'] = '1';
                ?>
                <script>
                  location.reload();
                </script>
                <?php
             }
        }

        //if has errors, show to the user
        if ($error == 1) {?>
            <script>
                jQuery(function($){
                    $('#formLogin .message-form').addClass('alert-warning');
                    $('#formLogin .message-form').html('<? echo $errorMessage;?>');
                })
            </script>
            <?
        }
    }

    //destroy the session and refresh the page
    public function logout() {
        session_start();
        session_destroy();
        ?>
        <script>
          location.reload();
        </script>
        <?php
    }

    
  }
?>