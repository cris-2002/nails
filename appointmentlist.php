<?php 
session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] != 'admin')) {
    header('Location: login.xml');
    exit();
}

if (($_SESSION['user_type'] != 'admin')) {
    header('Location: home.xml');
    exit();
}

$timeList = array(  '1' => '8:00-9:30 AM',
                    '2' => '10:00-11:30 AM',
                    '3' => '1:00-2:30 PM',
                    '4' => '3:00-4:30 PM'
                );

date_default_timezone_set('Asia/Manila');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
<title>Pretty Nails</title>
<style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        padding-top: 20px;
                    }
                    header {
                        color: #000000;
                        padding: 30px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }
                    nav {
                        flex-grow: 4;
                        display: flex;
                        justify-content: space-evenly;

                    }

                    nav a {
                        color: #000000;
                        text-decoration: none;
                        margin-right: 10px;
                        font-size: 30px;
                    }

                    nav a.active{
                        padding: 1px 22px;
                        color: #000000 !important;
                        background: #CD9B9D;
                        border: 1px solid #ffdb99;
                        border-radius: 20px;
                    } 

                    .logo {
                        width: 150px; 
                        height: 150px; 
                        border-radius: 50%;
                    }

                    .button {
                        align-self: flex-start;
                        background-color: #CD9B9D; /* Green */
                        border: none;
                        color: white;
                        padding: 10px 20px;
                        text-align: center;
                        text-decoration: none;
                        font-size: 16px;
                        border-radius: 20px;
                        cursor: pointer;

                    }


                    .button2 {
                        align-self: flex-end;
                        background-color: #CD9B9D; /* Green */
                        border: none;
                        color: white;
                        padding: 10px 20px;
                        text-align: center;
                        text-decoration: none;
                        font-size: 16px;
                        border-radius: 20px;
                        cursor: pointer;
                        margin-bottom: 10px;
                        margin-left: 310px;

                    }



                    .button:hover {
                        background-color: #f5b9b9;

                    }



                    .button2:hover {
                        background-color: #f5b9b9;

                    }

                    section {
                        width: 200px;
                        height: 200px;
                    }


                    section img {
                        width: 100%;
                        height: 100%;
                        -webkit-mask: url('./catcher-mit-blob.svg') center / contain no-repeat;
                    }

                    section p {
                        text-align: center;
                        margin: 5px;

                    }


                    category {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;

                    }

                    main {

                        
                        padding: 20px;
                        display: flex;
                        flex-direction: column;
                        
                        align-items: center;
                    }

                    .sidecontent {
                        flex-grow: 1;
                        
                        text-align: left;                   

                    }


                    sidetext {
                        display: flex;
                        flex-direction: column;  column-gap: 10px;

                    border-top: 2px solid #000; /* Border line at the top */
                    border-bottom: 2px solid #000;   

                    }
                    .maincontent {
                        flex-grow: 4;
                        display: flex;
                        justify-content: space-evenly;

                    }


                    footer {
                        
                        margin-top: 80px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;

                        background-color: #88A795;
                        color: #fff;
                        position: fixed;
                        bottom: 0;
                        bottom: 0;
                        width: 100%;
                    }

                    .icons {
                        display: flex;
                        justify-content: center;
                        align-items: center;    
                        margin-left: 50px;
                    }
                    .icon {
                        background-color: #CD9B9D;
                        border-radius: 20px;
                        padding: 5px;

                        width: 20px; /* Set the desired width */
                        height: 20px; /* Set the desired height */
                        margin-right: 10px; /* Adjust spacing between icons */
                        background-size: cover; /* Resize the background image to cover the container */
                        background-repeat: no-repeat; 
                    }

                    .locations {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-right: 20px;
                    }
                    .location {
                        background-color: #CD9B9D;
                        border-radius: 20px;
                        padding: 5px;
                        width: 20px; /* Set the desired width */
                        height: 20px; /* Set the desired height */
                        margin-left: 10px; /* Adjust spacing between icons */
                        margin-right: 5px; /* Adjust spacing between icons */
                        background-size: cover; /* Resize the background image to cover the container */
                        background-repeat: no-repeat; 
                    }


                    h2.title {
                        position: absolute;
                        top: 140px;
                        font-family: "Dancing Script", cursive;
                        font-optical-sizing: auto;
                        font-weight: 400;
                        font-style: normal;
                        font-size: 50px;

                    }


                    h2.sidetitle {
                        font-family: "Dancing Script", cursive;
                        font-optical-sizing: auto;
                        font-weight: 400;
                        font-style: normal;
                        margin: 0;
                        font-size: 30px;
                        text-align: center;
                        margin-bottom: 20px;

                    }
                    .content {
                        width: 100%;
                        margin: 20px;
                    }
                    p {
                        margin: 0;
                    }

                </style>
</head>
<body>
<header><img src="logo.png" alt="Logo" class="logo"><nav><a href="./home.xml" class="">HOME</a><a href="./services.xml" class="">SERVICES</a><a href="./portfolio.xml" class="">PORTFOLIO</a><a href="./contact.xml" class="">CONTACT US</a></nav><button onclick="document.location='./appointment.xml'" class="button">SET AN APPOINTMENT</button></header>

<main>





    <div class="content">


        <div style="display: flex; background-color: #CD9B9D; width: 100%; padding: 10px; margin-bottom: 20px; justify-content: space-between;">

            <div style="display: flex;">

                <div style="display: flex; border-right: 2px solid black;">
                    <img src="girl.jpg" alt="Logo" style="height: 50px">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;margin-right: 20px;">                 
                        <p>April Dawn Tagarda</p>
                        <p>Nail technician</p>
                        <p>prettynailsbydawn@gmail.com</p>


                    </div>                
                </div>

                <div style="display: flex; border-right: 2px solid black;">
                    <img src="cale.jpg" alt="Logo" style="height: 50px">
                    <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center;margin-right: 20px;">                 
                        <p>Today</p>
                        <p><?= date('F d, Y'); ?></p>


                    </div>                
                </div>
                
            </div>

            <div style="display: flex; align-self: flex-end; justify-content: center;">
                <button onclick="document.location='./logout.php'" class="button" style="background: black">Logout</button>             
            </div>
            
            
        </div>



            <table id="example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Services</th>
                        <th>Other</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                        define('HOST','localhost');
                        define('USERNAME', 'root');
                        define('PASSWORD','');
                        define('DB','nails');                                                 
                        $con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

                        $query = "SELECT * FROM `client` 
                                    JOIN `user` ON `client`.`user_id` = `user`.`user_id` ORDER BY client_date DESC"; 
                        $result = mysqli_query($con, $query); 

                        if (mysqli_num_rows($result) > 0) :
                          while($row = mysqli_fetch_assoc($result)) :

                     ?>

                        <tr>
                            <td><?php echo $row["user_fname"] . ' ' . $row["user_lname"]; ?></td>
                            <td><?php echo $row["user_number"]; ?></td>
                            <td><?php echo $row["client_service"]; ?></td>
                            <td><?php echo $row["client_additional"]; ?></td>
                            <td><?php echo $row["client_date"]; ?></td>
                            <td><?php echo $timeList[$row["client_time"]]; ?></td>
                            <td><?php echo $row["client_note"]; ?></td>
                            <!-- <td><?= ($row["client_status"] == 1) ? 'Pending' : 'Done' ; ?></td> -->


                            <td>
                                <label><input type="checkbox" name="<?= $row["client_id"]; ?>" value="1" <?= ($row["client_status"] == 1) ? 'checked' : '' ; ?> > Pending 
                                </label>
                                <label><input type="checkbox" name="<?= $row["client_id"]; ?>" value="2" <?= ($row["client_status"] == 2) ? 'checked' : '' ; ?> > Done
                                </label>
                            </td>

                            <td>
                                <button class="btn delete" style="background-color: #BC7B77; border-radius: 50%; color: white; padding: 4px 6px; border: none" data-toggle="tooltip" data-placement="top" style="margin-right: 10px" type="button" data-id="<?php echo $row["client_id"]; ?>" data-role="view"> <i class="fa fa-trash"></i>
                                </button>
                            </td>  
                        </tr>

                     <?php 
                          endwhile;
                        endif; 
                      ?>

                </tbody>
            </table>
          </div>


</main>

<footer><div class="icons">
    <a href="https://www.facebook.com/prettynailsbydawn?mibextid=LQQJ4d">        
        <img src="facebook_icon.png" class="icon" href="">
    </a>     
    <a href="https://www.instagram.com/prettynailsbydawn?igsh=MXZzZ21jaG15Yzlp">        
        <img src="instagram_icon.png" class="icon">
    </a>     

</div>
<div class="locations">
<img src="telephone_icon.png" class="location"><p>09198422740 </p>
<img src="location_icon.png" class="location"><p>Purok 3, Luz Banzon Misamis Oriental</p>
</div></footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').dataTable({
                            "bLengthChange": true,
                            "language": {
                                "lengthMenu": "_MENU_ entries",
                            },
                            "bFilter": true,
                            "bInfo": false});


                        $('input[type="checkbox"]').on('change', function() {

                                        client_id = $(this).attr('name');

                            $('input[type="checkbox"][name="' + client_id + '"]').not(this).prop('checked', false);

                            
                            if ($(this).is(':checked')) {
                                // Perform AJAX request
                                $.ajax({
                                    url: 'appointmentsave.php', // Replace with your server endpoint
                                    type: 'POST',
                                    data: {
                                        action_name: 'client_status',
                                        id: $(this).val(),
                                        client_id: $(this).attr('name')

                                    },
                                    success: function(response) {
                                        console.log('Server response:', response);
                                        alert('Status Updated!')
                                        // Handle the server response here
                                    }
                                });
                            }
                        });




                        $('.delete').click(function(){
                            var el = this;
                            var deleteid = $(this).data('id');

                            var confirmalert = confirm("Are you sure you want to delete?");
                            if (confirmalert == true) {
                                $.ajax({
                                    url: 'appointmentsave.php',
                                    type: 'POST',
                                    data: { 
                                        action_name:'delete', 
                                        client_id:deleteid
                                    },
                                    success: function(response){
                                        if(response == 1){                                    
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        });
                        



                    });

                </script>
                <script>

                    $(document).ready(function() {

                    $('#client_date').change(function() {
                        var selectedDate = $(this).val();

                        $.ajax({
                            url: 'get_options.php', // Path to server-side script
                            method: 'POST',
                            data: { date: selectedDate },
                            dataType: 'json', // Expected data type from server
                            success: function(response) {


                                    console.log(response);
                                    $('#client_time').empty();
                                    $.each(response, function(index, option) {
                                        $('#client_time').append($('<option>', {
                                            value: index,
                                            text: option
                                        }, '</option>'));
                                    });

                            }
                        });
                    });


                });

                </script>

</body>
</html>