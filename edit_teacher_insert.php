<?php include './connection.php'; ?>

<?php 
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);

    $id= $mydata['sid'];
    $teacher_name= $mydata['teacher_name'];
    $teacher_email= $mydata['teacher_email'];
    $teacher_phone= $mydata['teacher_phone'];
    

    if(!empty($teacher_name) && !empty($teacher_email) && !empty($teacher_phone)){
        // $sql1 = "SELECT * FROM courses where course_code='$course_code'";
        // $sql2 = "SELECT * FROM courses where course_title='$course_title'";
        // $sql="INSERT INTO courses(course_code, course_title) VALUES('$course_code','$course_title')";
        $sql ="UPDATE teachers SET teacher_name='$teacher_name',teacher_email='$teacher_email',teacher_phone=$teacher_phone WHERE id={$id}";
        // $r1 = mysqli_query($conn, $sql1);
        // $r2 = mysqli_query($conn, $sql2);
        // if(mysqli_num_rows($r1)>0){
        //     echo "Course code are already exist";
        // }
        // else if(mysqli_num_rows($r2)>0){
        //     echo "Course Title are already exist";
        // }
        
        if($conn->query($sql)==TRUE){
            echo 1;
        }
        else{
            echo "Course not added";   
        }
    }
    else{
        echo "All Fields are required";
    }

?>