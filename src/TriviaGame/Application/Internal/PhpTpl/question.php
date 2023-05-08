<fieldset>

<legend><?=$this->$this->questionText?></legend>
<?php
    foreach($this->answers as $answer): ?>
    <input type="checkbox" value="<?=$answer?>" name="answer_<?=$this->no?>">
<?php
    endforeach;
?>
</fieldset>