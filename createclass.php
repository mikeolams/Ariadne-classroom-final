<?php
require_once "includes/config.php";
$error = "";

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $var;
}

$query = "SELECT user_id, username, fullname FROM user";
$result = $query($query);
$user = $result->fetch_assoc();

if ($result->num_rows > 0) {
    // output data of each row
    $username = $user['username'];
   /* while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }*/
} else {
    echo "0 results";
    $username = "";
}

if (isset($_POST['classname'])) {
    $name = sanitizeString($_POST['classname']);
    $name_length = strlen($name);
    $title = sanitizeString($_POST['classtitle']);
    $title_length = strlen($title);
    $subjects = sanitizeString($_POST['subjects']);
    $level = sanitizeString($_POST['level']);
    $exercise = sanitizeString($_POST['exercise']);
    $quiz = sanitizeString($_POST['quiz']);

    if ($name != "" && $title != "" && $subjects != "" && $level != "") {
        if ($name_length < 4) {
            $error = "Class name must be at least four characters";
        } elseif ($name_length > 100) {
            $error = "Class name can't be more than 100 characters";
        } elseif ($title_length < 4) {
            $error = "Class title must be at least four characters";
        } elseif ($title_length > 100) {
            $error = "Class title can't be more than 100 characters";
        } else {
            $sql = "INSERT INTO class (class_id, username, class_name, course_title, category, course_level, exercise, quiz)
            VALUES (NULL, '$username', '$name', '$title', '$subjects', '$level', '$exercise', '$quiz')";

            if ($connect->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        }
    } else {
        $error = "Please ensure Class Name, Course Title, Subjects and Level fields are not empty";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Class</title>
    <link rel="stylesheet" type="text/css" href="createclass.css" />
</head>

<body>
    <div class="container">

        <header>
            <div class="header">

                <?php
                include "header.php"; ?>
            </div>
            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
        </header>

        <form id="form" action="createclass.php" method="post">
            <h1>Create a class for your students</h1>
            <h3 id="subheader">Enter the details about your class, courses and grades</h3>
            <p><?php echo $error; ?></p>

            <div>
                <div id="error"></div>
                <table class="formtable">
                    <tr class="tablerows">
                        <th>Class Name</th>
                        <th>Course Title</th>
                    </tr>

                    <div id="error"></div>
                    <tr>
                        <td><input type="text" name="classname" id="className" placeholder="Enter Class Name" autocomplete="on"></td>
                        <td><input type="text" name="classtitle" id="classTitle" placeholder="Enter Class Title" autocomplete="on"></td>
                    </tr>

                    <tr>
                        <th class="headertwo">Select Class Category</th>
                        <th class="headertwo">Select Course Level</th>
                    </tr>

                    <div id="error"></div>
                    <tr>
                        <td>
                            <select name="subjects" class="subjects" id="select1">
                                <option value="">--Please choose an option--</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Science">Data Science</option>
                                <option value="AI">Artificial Intelligence</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="Oracle DataBase">Oracle DataBase</option>
                                <option value="Cisco Networking">Cisco Networking</option>
                                <option value="RedHat Linux">RedHat Linux</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Microsoft">Microsoft System Administration</option>
                            </select>
                        </td>

                        <td>
                            <select name="level" class="courselevel" id="select1">
                                <option value="">--Please choose an option--</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="expert">Expert</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Add an Exercise</th>
                        <th>Add a Quiz</th>
                    </tr>

                    <div id="error"></div>
                    <tr>
                        <td>
                            <select name="exercise" class="exercise" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="Web Development">Build a Calculator</option>
                                <option value="Data Science">Build a Facebook Login page</option>
                                <option value="AI">Build an estate management system</option>
                            </select>
                        </td>
                        <td>
                            <select name="quiz" class="quiz" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="">What do you intend achieving after this course?</option>
                                <option value="">What Career path do you desire?</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <ul>
                    <li><label for="fileupload" id="fileupload"> Upload a Course Video</label></li>
                    <input id="file-upload" type="video" />

                    <li><input type="file" name="fileupload" value="fileupload" id="fileupload" accept="video/*"></li>

                    <li><button value="uploadfile" id="uploadfile">UPLOAD</button></li>

                    <button id="createbutton" type="submit">Create Classroom</button>

                </ul>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="createclass.js"></script>
</body>

</html>