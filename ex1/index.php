<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .student{
        border:1px solid black;
        border-radius: 5px;
    }
</style>
<?php 

class etudiant{
    public $name;
    public $notes;
    function __construct($name, $notes){
        $this->name = $name;
        $this->notes = $notes;
    }
    function display(){
        echo "$this->name : ";
        foreach($this->notes as $note){
            echo "$note ";
        }
    }
    function average(){
        $sum = 0;
        foreach($this->notes as $note){
            $sum += $note;
        }
        return $sum/count($this->notes);
    }
    function admittance(){
        if ($this->average() >=0){
            echo "$this->name is admitted";
        }else{
            echo "$this->name is rejected";
        }
    }
}

$dhia = new etudiant("dhia", array( 15, 12, 10, 9, 5.5, 18.5));
$mo3taz = new etudiant("mo3tazz", array(13, 14, 11, 12.5, 9.75));
$students = array($dhia, $mo3taz);
?>
<div class = "container-fluid">
    <div class = "row">
        <?php foreach($students as $student){?>
            <div class="col container flex-d flex-column student">
                <?php echo $student->name;
                    foreach($student->notes as $note){

                        $flag = "danger";
                        if ($note==10){
                            $flag = "warning";
                        }
                        if ($note>10){
                            $flag = "success";
                        }?>
                        
                        <div class = "alert alert-<?php echo $flag?>">
                        <?php echo $note?>
                        </div>
                    <?php }?>
                    <div class = "alert alert-info">
                    Your average is :<?php echo $student->average()?>
                    </div>
            </div>
        <?php }?>
            
    </div>
</div>