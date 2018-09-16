<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prueba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
<!--   <link rel="stylesheet" href="css/jquery.dataTables.min.css">-->
   <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
   
<!--
   
   
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
-->
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Test</h2>
                        <a href="create.php" class="btn btn-success pull-right">Agregar Registro</a>
                    </div>
                    <?php
                    // Include config file
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM 
                            (select * from employees) as employees
                            inner join 
                            (select detalle, id as idloc from localidades) as localidades
                            on(employees.id_localidad=localidades.idloc)
                    
                    
                    ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
//                            echo "<table class='table table-bordered table-striped'>";
 //                           echo "<table class='display' id='example' cellspacing='0' width='100'>";
                             echo "<table class='table table-bordered table-striped' id='example' cellspacing='0' width='600'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Direccion</th>";
                                        echo "<th>Localidad</th>";
                                        echo "<th>Salario</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                             $suma = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['detalle'] . "</td>";
                                        echo "<td>" . number_format($row['salary'],2) . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                    
                                   
                                     $suma += $row['salary'];
                                
                                    
                                }
                                echo "</tbody>"; 
                            
                            echo "<tfoot>";
                                echo "<tr>" . "</td>";
                                    echo "<td style='font-weight: bold;'> Total" . "</td>";
                                    echo "<td>" . "</td>";
                                    echo "<td>" . "</td>";
                                    echo "<td style='font-weight: bold;'>" . number_format($suma,2) ."</td>";
                                    echo "<td>" . "</td>";
                                
                                echo "</tr>";
                            
                            
                            echo "</tfoot>";
                            
                            
                            
                            
                            
                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    
    
    
</body>
</html>