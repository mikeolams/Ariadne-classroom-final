<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Class</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="createclass.css" />
</head>

<body>
    <div class="container col-md-10 mx-auto mt-5">

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

        <form id="form" action="" method="post" class="col-md-8 col-10 col-sm-10 mx-auto">
            <h1>Create a class for your students</h1>
            <h3 id="subheader">Enter the details about your class, courses and grades</h3>

            <div>
                <div id="error"></div>
                <div class="form-row formtable">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputEmail4">Class Name</label>
                        <input type="text" class="form-control" id="className" placeholder="Enter Class Name" autocomplete="on">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Course Title</label>
                        <input type="text" class="form-control" id="className" placeholder="Enter Class Name" autocomplete="on">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="class">Select Class Category</label>
                        <select name="subjects" class="subjects form-control" id="select1">
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
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Select Course Level</label>
                        <select name="subjects" class="courselevel form-control" id="select1">
                            <option value="">--Please choose an option--</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputEmail4">Add an Exercise</label>
                        <select name="subjects" class="exercise form-control" id="select2">
                            <option value="">--Select an option--</option>
                            <option value="Web Development">Build a Calculator</option>
                            <option value="Data Science">Build a Facebook Login page</option>
                            <option value="AI">Build an estate management system</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Add an Quiz</label>
                        <select name="subjects" class="quiz form-control" id="select2">
                            <option value="">--Select an option--</option>
                            <option value="">What do you intend achieving after this course?</option>
                            <option value="">What Career path do you desire?</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="row formtable">
                    <tr class="tablerows">
                        <div class="col-md-6 col-sm-12 ">
                            Class Name
                            <input type="text" id="className" placeholder="Enter Class Name" autocomplete="on">

                        </div>
                        <th>Course Title</th>
                        </tr>

                        <div id="error"></div>
                    <tr>
                        <td><input type="text" id="className" placeholder="Enter Class Name" autocomplete="on"></td>
                        <td><input type="text" id="classTitle" placeholder="Enter Class Title" autocomplete="on"></td>
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
                            <select name="subjects" class="courselevel" id="select1">
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
                            <select name="subjects" class="exercise" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="Web Development">Build a Calculator</option>
                                <option value="Data Science">Build a Facebook Login page</option>
                                <option value="AI">Build an estate management system</option>
                            </select>
                        </td>
                        <td>
                            <select name="subjects" class="quiz" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="">What do you intend achieving after this course?</option>
                                <option value="">What Career path do you desire?</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                </div> -->

            <div>
                <ul class="px-0">
                    <li><label for="fileupload" id="fileupload"> Upload a Course Video</label></li>
                    <input id="file-upload" class="form-control" type="video" />

                    <li><input type="file" class="form-control mt-2" name=" fileupload" value="fileupload" id="fileupload" accept="video/*"></li>

                    <li><button value="uploadfile" class="form-control mt-2" id=" uploadfile">UPLOAD</button></li>

                    <button id="createbutton" class="form-control mt-2" type="submit">Create Classroom</button>

                </ul>
            </div>
        </form>


    </div>
    <div>
        <footer class="pt-3 mt-3">
            <p>Copyright © 2019 All rights reserved | Team Ariadne</p>
        </footer>
    </div>

    <script type="text/javascript" src="createclass.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>