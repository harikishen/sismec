<?php
$servername = "localhost";
$username = "root";
$password = "turbodrive111";
$dbname = "harikishen";

session_start();
$_POST = $_SESSION;
if($_POST["direct"]!=1)
	{die('Access Denied');}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$id=$last_id;
$admission_id=$id;
$type=null;
$house_name=$_POST["hname"];
$place1=$_POST["pl1"];
$place2=$_POST["pl2"];
$post_office=$_POST["poffice"];
$district=$_POST["district"];
$state=$_POST["state"];
$pin=null;
$admission_no=$_POST["admno"];
$name=$_POST["name"];
$date_of_birth=$_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
$sex=$_POST["sex"];
$caste=$_POST["caste"];
$religion=$_POST["religion"];

//present addr
$phouse_name=$_POST["phname"];
$pplace1=$_POST["ppl1"];
$pplace2=$_POST["ppl2"];
$ppost_office=$_POST["ppoffice"];
$pdistrict=$_POST["pdistrict"];
$pstate=$_POST["pstate"];

//gaurdian
$ghouse_name=$_POST["ghname"];
$gplace1=$_POST["gpl1"];
$gplace2=$_POST["gpl2"];
$gpost_office=$_POST["gpoffice"];
$gdistrict=$_POST["gdistrict"];
$gstate=$_POST["gstate"];

$naitivity=null;
$village=null;
$taluk=null;
$relation=$_POST["relation"];
$blood_group=$_POST["bgroup"];
$annual_income=null;
$student_mobile=$_POST["spho"];
$student_email=$_POST["semail"];
$date_of_admission=$_POST["year1"].'-'.$_POST["month1"].'-'.$_POST["day1"];
$course_id=null;
$category_id=null;
$reservation_id=null;
$detail_id=null;
$transfercertificate_id=null;
$rollno=$_POST["roll"];
$batch=null;
$semester=$_POST["sem"];

$class=$_POST["class"];
$regno=null;
$year_po=null;
$previous_institution=$_POST["prev"];
$register_no=null;
$tc_no=null;
$tc_date=null;
$entrance_roll_no=null;
$entrance_rank=$_POST["rank"];
$qualifying_board=$_POST["qboard"];
$qualifying_exam=$_POST["qexam"];
$percentage=$_POST["percentage"];
$year_po=$year_of_pass=$_POST["yop"];

//mother father
$fname=$_POST["fname"];
$foccupation=$_POST["focc"];
$femail_address=$_POST["femail"];
$fphone_no=$_POST["fpho"];
$mname=$_POST["mname"];
$moccupation=$_POST["mocc"];
$memail_address=$_POST["memail"];
$mphone_no=$_POST["mpho"];





$sql = "INSERT INTO admissions (id,admission_no,name,date_of_birth,sex,caste,religion,naitivity,village,taluk,relation,blood_group,annual_income,student_mobile,student_email,date_of_admission, course_id,category_id,reservation_id,detail_id,transfercertificate_id,rollno,batch,semester,phone_no,class,regno,year_po)
VALUES ('$id','$admission_no','$name','$date_of_birth','$sex','$caste','$religion','$naitivity','$village','$taluk','$relation','$blood_group','$annual_income',
'$student_mobile','$student_email','$date_of_admission','$course_id','$category_id','$reservation_id','$detail_id','$transfercertificate_id','$rollno','$batch',
'$semester','$phone_no','$class','$regno','$year_po');";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $id=$last_id;
    echo "New record created successfully in admissions. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO addresses (id,admission_id,type,house_name,place1,place2,post_office,district,state,pin)
VALUES ('$id','$admission_id','$type','$house_name','$place1','$place2','$post_office','$district','$state','$pin');";
if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully in addresses.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO details (id,previous_institution,register_no,tc_no,tc_date,entrance_roll_no,entrance_rank,qualifying_board,qualifying_exam,
percentage,year_of_pass)
VALUES ('$id','$previous_institution','$register_no','$tc_no','$tc_date','$entrance_roll_no','$entrance_rank','$qualifying_board','$qualifying_exam',
'$percentage','$year_of_pass');";
if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully in details.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO relatives (id,admission_id,type,name,occupation,email_address,phone_no)
VALUES ('$id','$admission_id','$type','$name','$occupation','$email_address','$phone_no');";
if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully in relatives.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

session_destroy();
$conn->close();
/*INSERT INTO addresses (id,admission_id,type,house_name,place1,place2,post_office,district,state,pin)
VALUES ('$id','$admission_id','$type','$house_name','$place1','$place2','$post_office','$district','$state','$pin');
INSERT INTO details (id,previous_institution,register_no,tc_no,tc_date,entrance_roll_no,entrance_rank,qualifying_board,qualifying_exam,
percentage,year_of_pass)
VALUES ('$id','$previous_institution','$register_no','$tc_no','$tc_date','$entrance_roll_no','$entrance_rank','$qualifying_board','$qualifying_exam',
'$percentage','$year_of_pass');INSERT INTO relatives (id,admission_id,type,name,occupation,email_address,phone_no)
VALUES ('$id','$admission_id','$type','$name','$occupation','$email_address','$phone_no');




INSERT INTO admissions (id,admission_no,name,date_of_birth,sex,caste,religion,naitivity,village,taluk,relation,blood_group,annual_income,student_mobile,student_email,date_of_admission, course_id,category_id,reservation_id,detail_id,transfercertificate_id,rollno,batch,semester,phone_no,class,regno,year_po)
VALUES ('$id','$admission_no','$name','$date_of_birth','$sex','$caste','$religion','$naitivity','$village','$taluk','$relation','$blood_group','$annual_income',
'$student_mobile','$student_email','$date_of_admission','$course_id','$category_id','$reservation_id','$detail_id','$transfercertificate_id','$rollno','$batch',
'$semester','$phone_no','$class','$regno','$year_po');*/
?>
