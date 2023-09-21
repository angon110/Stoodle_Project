<?php
class method extends mysqli{
    private $state_csv = false;
    public function __construct(){
            parent::__construct("localhost","root","","test");
            if($this->connect_error){
                echo "fail to connect to database :".$this->connect_error;
            }
    }
    public function import($file)
        {
            $this->state_csv = false;
            $file = fopen($file,'r');
            while($row =fgetcsv($file))
            {
                $value = "'".implode("','",$row)."'";
                $q = "INSERT INTO student(studentID,studentName) VALUES(".$value.")"; 
                if($this->query($q)){
                    $this->state_csv = true;
                }else{
                    $this->state_csv= false;
                    echo $this->error;
                }
            }
                    if ($this->state_csv){
                        echo "Successfully Imported ";
                    }else{
                        echo "Something went wrong  ";
                    }
                    fclose($file);
        }
        public function update($file)
        {
            $this->state_csv = false;
            $file = fopen($file,'r');
            while($row = fgetcsv($file))
            {
                $id = $row[0];
                $name = $row[1];
                $del1 = $row[2];
                $del2 = $row[3];
                $del3 = $row[4];
                $midterm = $row[5];
                $final = $row[6];
                $feedback = $row[7];

                $q = "UPDATE student SET del1 = '$del1',del2 = '$del2',del3 = '$del3',midterm = '$midterm',final = '$final',feedback = '$feedback' WHERE studentID = '$id'";
                
                if($this->query($q)){
                    $this->state_csv = true;
                }else{
                    $this->state_csv= false;
                    echo $this->error;
                }
            }
                    if ($this->state_csv){
                        echo "Successfully Imported ";
                    }else{
                        echo "Something went wrong  ";
                    }
                    fclose($file);
        }

        
}
    


?>

