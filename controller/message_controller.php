<?php
require_once('model/connection/connection.php');
require_once('model/message_model.php');

class MessageController {
    //save the message
    public function message() {

        //set the correct text based on the language
        if (isset($_GET['lg']) && $_GET['lg'] == 'ptbr') {
            $errorMessage = 'Ops... verifique as informações digitadas ou atualize a página por favor.';
            $successMessage = 'Informações enviadas com sucesso! Obrigado!';
        } else {
            $errorMessage = 'Check the informations typed or refresh the page please.';
            $successMessage = 'Informations send with success! Thanks!';
        }
        $error = 0;

        //check if the all parameters has been received
        if (!isset($_POST['inputNickname']) || !isset($_POST['inputProblem']) || !isset($_POST['inputSuggestion'])) {
            $error = 1;
        }

        $inputNickname = $_POST['inputNickname'];
        $inputProblem = $_POST['inputProblem'];
        $inputSuggestion = $_POST['inputSuggestion'];

        //check the length of the inputs
        if ((strlen($inputNickname) == 0 || strlen($inputNickname) > 30) || (strlen($inputSuggestion) == 0 || strlen($inputSuggestion) > 255)) {
            $error = 1;
        }

        if ($error == 0) {
            //insert a new message
            $msg = new Message();
            $error = $msg->InsertMessage($inputNickname,$inputProblem,$inputSuggestion);
            //if the message has inserted
            if ($error == 0) {
                ?>
                <script>
                    jQuery(function($){
                        //reset the form
                        $('#formContact .message-form').removeClass('alert-warning').addClass('alert-success');
                        $('#formContact .message-form').html('<? echo $successMessage;?>');
                        $('#formContact').find('input[id!=lg],textarea,select').val('');
                        //refresh the list of messages
                        $('#getMessages').click();
                    })
                </script>
                <?
            }
        }

        //if has errors, show to the user
        if ($error == 1) {?>
            <script>
                jQuery(function($){
                    $('.message-form').addClass('alert-warning');
                    $('.message-form').html('<? echo $errorMessage;?>');
                })
            </script>
            <?
        }
    }

    //function for delete a message
    public function delete() {
        session_start();
        //check the parameter and the user
        if (isset($_POST['message']) || isset($_SESSION['connected'])) {
            $message = $_POST['message'];
            $msg = new Message();
            //update the active of message
            $error = $msg->DeleteMessage($message);
            //if the message has deleted
            if ($error == 0) { ?>
                <script>
                    //remove the row of message
                    jQuery('#message<?php echo $message?>').remove();
                </script>
            <?php }
        }
    }

    //get the list of messages
    public function getList() {
        session_start();
        //set the correct language
        if (isset($_GET['lg']) && $_GET['lg'] == 'ptbr') {
            $nickname = 'Apelido';
            $question1 = 'Você considera a segurança da Inteligência Artificial um problema atual?';
            $suggestion = 'Comentário/Sugestão';
            $questions = [
                0 => "Sim",
                1 => "Não",
                2 => "Não sei"
            ];
        } else {
            $nickname = 'Nickname';
            $question1 = 'Do you consider the  Artificial Intelligence´s security a current problem?';
            $suggestion = 'Comment/Suggest';
            $questions = [
                0 => "Yes",
                1 => "No",
                2 => "I Don´t Know"
            ];
        }

        $connected = '0';
        //check the user has logged
        if(isset($_SESSION['connected'])) {
             $connected = '1';
        }

        //create a new message and get the list of messages and the percentage by option
        $msg = new Message();
        $result = $msg->getMessages();
        $avg = $msg->percentageQuestions();
        $totalAnswers = 0;
        //get the total of messages
        foreach($avg as $t) {
            $totalAnswers = $totalAnswers + $t['Total'];
        }

        require_once('view/messages.php');
    }
}

?>