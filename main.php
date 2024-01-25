<?php
include 'connectin.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4 text-center text-primary"> <b> CRUD </b></h1>

        <span id="message"></span>
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9">
                        Sample Data
                    </div>
                    <div class="col col-sm-3">
                        <button type="button" id="add_data" class="btn btn-success btn-sm float-end"
                            data-bs-toggle="modal" data-bs-target="#action_modal">Add</button>
                    </div>
                </div>

            </div>
            <div class="card-body">





                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>


            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="action_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="sample_form">
                    <div class="modal-header" id="dynamic_modal_title">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">




                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="Enter your first name:">
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Enter your first name:">
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Gender</label>
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age:">
                        </div>

                    </div>
                    <div class="modal-footer">


                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Modal2 -->
    <div class="modal fade" id="action_modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="" method="post" id="sample_form2">
                    <div class="modal-header" id="dynamic_modal_title">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <!-- <p id="eidPlaceholder"></p> -->
                        <input type="hidden" name="action" id="studentid" value="" />


                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="first_name1" name="first_name1"
                                placeholder="Enter your first name:">
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last_name1" name="last_name1"
                                placeholder="Enter your first name:">
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Gender</label>
                            <select name="gender1" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exmapleFormControlinput1" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age1" name="age1"
                                placeholder="Enter your age:">
                        </div>

                    </div>
                    <div class="modal-footer">



                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="action_button2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {




            load_data();



            function load_data() {
                $.ajax({
                    url: 'http://localhost/PHP_CRUD/addData.php',
                    method: 'POST',
                    data: { action: 'fetch' },
                    dataType: 'JSON',
                    success: (response) => {
                        let html = '';
                        if (response.data.length > 0) {
                            for (let count = 0; count < response.data.length; count++) {
                                html += `
                                <tr>
                                    <td>`+ response.data[count].first_name + `</td>
                                    <td>`+ response.data[count].last_name + `</td>
                                    <td>`+ response.data[count].gender + `</td>
                                    <td>`+ response.data[count].age + `</td>
                                    <td> 
                                    <button type="button" data-eid='${response.data[count].id}' id='edit' data-bs-toggle="modal" data-bs-target="#action_modal2" class="btn btn-success edit">Edit</button> 
                                    <button type="button"  data-did='${response.data[count].id}' id='del' class="btn btn-danger delete"   > Delete</button >
                                    </td >
                                </tr >
                                `;
                            }
                        }
                        $('#sample_data tbody').html(html);
                    }

                })
            }
            $('#add_data').click(() => {
                // $('#dynamic_modal_title').text('Add Data');
                // $('#action_button').text('Add');
                // $('#action_modal').modal('show');
                $('#sample_form')[0].reset();

            })


            $(document).on('click', '.edit', function () {
                let id = $(this).data('eid');

                $.ajax({
                    url: 'http://localhost/PHP_CRUD/editData.php',
                    method: 'POST',
                    data: { id: id },

                    success: (response) => {
                        var jsonData = JSON.parse(response);

                        // Access the firstname property
                        var firstname = jsonData.firstname;
                        var lastname = jsonData.lastname;
                        var gender = jsonData.gender;
                        var age = jsonData.age;

                        $('#action_modal2').modal('show');
                        $('#studentid').val(id);
                        $('#first_name1').val(firstname);
                        $('#last_name1').val(lastname);
                        $('#gender1').val(gender);
                        $('#age1').val(age);
                    }
                })
            })

            $('#sample_form').on('submit', (event) => {
                event.preventDefault();
                $.ajax({
                    url: 'http://localhost/PHP_CRUD/savedata.php',
                    method: 'POST',
                    data: $('#sample_form').serialize(),
                    dataType: "JSON",

                    success: (response) => {

                        if (response == "1") {
                            $('#action_modal').modal('hide');
                            load_data();
                        }
                    }
                })
            });


            $('#sample_form2').on('submit', (event) => {
                event.preventDefault();
                $.ajax({
                    url: 'http://localhost/PHP_CRUD/updateEdit.php',
                    method: 'POST',
                    data: $('#sample_form2').serialize(),
                    dataType: "JSON",

                    success: (response) => {

                        if (response == "1") {
                            $('#action_modal2').modal('hide');
                            load_data();
                        }
                    }
                })
            });


            $(document).on('click', '.delete', function () {

                let id = $(this).data('did');

                $.ajax({

                    url: 'http://localhost/PHP_CRUD/deleteData.php',
                    method: 'POST',
                    data: { id: id },
                    success: (response) => {
                        load_data();
                    }
                })
            })
        });

    </script>



</body>

</html>