<html>

<head>
    <title> Professor Dashboard </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--Nav bar-->
    <nav class="navbar navbar-expand-sm nav-dark site-head">
        <a class="navbar-brand my-brand"> UB </a>
        <ul class= "navbar-nav navbarlist">
            <li class="nav-item">
                <a class="nav-link active" href="#"> Dashboard </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> Inbox </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> Log out</a>
            </li>
        </ul>
    </nav>

    <div class = "container">
        
        <table class="professorcourse" id="professorcourse" sytle="width:100%" cellspacing="0">
            <thead>
                <th> Course ID </th>
                <th> Term  </th>
                <th> Department </th>
                <!--TODO: Can Add number of students column here-->
        </table>
    </div>

    <script type ="text/javascript">

    $(document).ready(function(){
        $('#professorcourse').DataTable({
        "scrollY": "400opx",
        "scrollCollapse": true,
        "paging": false,
        "bDestroy": true,
        "ajax":{
            "url": "professor-course-fetch.php",
            "dataSrc": ""

        },
        
        "columnes" : [{
            "data": "cousreid"
        },
        {
            "data": "term"
        },
        {
            "data": "dept"
        }
        ]
    });

    });
    </script>

</body>
</html>