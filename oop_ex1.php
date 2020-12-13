<?php
class Student {
    public $id;
    public $name;
    public $email;
    public $mobile_number;
    public function __construct($id,  $name , $email , $mobile_number) {
     $this->id            = $id;
     $this->name          = $name;
     $this->email         = $email;
     $this->mobile_number = $mobile_number;
   }
    function name(){
 echo $this->id ; 
    }
    function mobile(){
 echo $this->mobile_number ; 
    }
 }

 $sara = new Student( 123443 , "sara@orange.com" , "Sara"," 0777777777");
 echo "sara's information: <br> ";
 $sara->name();
 echo "<br>";
 $sara->mobile();
 echo "<br>";

////////////////////////////////////////////////////////////////////////////////////////////////////
 class Teacher extends Student {
    public function __construct($id,  $name , $email , $mobile_number , $salary , $subjects ) {
        $this->name = $id;
        $this->name = $name;
        $this->color = $email;
        $this->color = $mobile_number;
        $this->salary = $salary;
        $this->subjects = $subjects;
    }
    function subjects (){
return $this->subjects ;
    }

}

$sadi = new Teacher (  96432 , "Sadi" , "Sadi@orange.com" , "0777788888" ,  "800" , ["English", "Arabic", "Math", "science"]);

echo "sadi's information: <br> ";
foreach($sadi->subjects() as $value ){
    echo $value ;
    echo "<br>" ;
}

?>