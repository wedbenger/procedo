<div class="col-md-12">
    <p class="lead">
    <? 
    //show the percentage of options
    echo $question1 ?>
    </p>
    <?php 
        //show the percentage  by questions, just show if has at least one answer
        if ($totalAnswers > 0 ) {
            foreach($avg as $a) { ?>
                <p class="lead">
                    <strong> <?php echo $questions[$a['Question']-1] ?>: <?php echo round(($a['Total']*100)/$totalAnswers,2) ?>% </strong>
                </p>
    <?php 
            }
        } 
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><? echo $nickname ?></th>
            <th scope="col"><? echo $question1 ?></th>
            <th scope="col"><? echo $suggestion ?></th>
            <th scope="col"></td>
        </tr>
        </thead>
        <tbody>
        <?php 
        $cont = 1;
        //show all the messages
        foreach($result as $r) { ?>
            	<tr id="message<?php echo $r['Id_message'] ?>">
                    <td><?php echo $cont ?></td>
                	<td><?php echo $r['Nickname'] ?></td>
                    <td><?php echo $questions[$r['Question']-1] ?></td>
                    <td><?php echo $r['Message'] ?></td>
                    <td>
                        <?php if($connected == '1') { ?>
                            <button type="button" class="btn btn-link delete-message" message="<?php echo $r['Id_message'] ?>" >Delete</button>
                        <?php } ?>
                    </td>
                </tr>
        <?php 
            $cont++;
        } 
        ?>
        </tbody>
    </table>
</div>
