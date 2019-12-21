<?php
    require_once('sessionSet.php');
?>
    <?php
        $userRol = $_SESSION['role'];
        
        ?>
        <html>

        <head>
            <title>Restrict content based upon user level example</title>
        </head>

        <body>
            <?php
            switch( $userRol ){
                    case 'DEO':
                        /* Basic user */
                        echo "
                            <script id='user' type='text/javascript'>
                                function view_record(){
                                    alert('hello world');
                                }
                            </script>
                        ";
                    break;
                    case 2:
                        /* Superuser */
                    break;

                    case 3:
                    case 'Admin':
                        /* Manager & Admin level users ? */
                        echo "
                        <script id='admin' type='text/javascript'>
                            function delete_all_users(){

                            }
                            function drop_tables(){

                            }
                            function drop_database(){

                            }
                            function edit_record(e){
                                alert(e+' edit record') 
                            }
                            function delete_record(e){
                                alert(e+' delete record')   
                            }
                        </script>
                        ";
                    break;  
                }
            
        ?>
                <table>
                    <?php
            /* Assuming you use php to generate the table: pseudo style code */
            while( $rs=$result->fetch() ){
                $editbttn='';
                $deletebttn='';

                if( in_array( $level, array( 3,4 ) ) ){
                    /* Admin & manager */
                    $editbttn="<a class='editbutton' onclick='edit_record(event)'><img src='Edit.png'/></a>";
                    $deletebttn="<a class='deletebutton' onclick='delete_record(event)'><img src='Delete.png'/></a>";
                }

                echo "
                    <tr>
                        <td>DATA</td>
                        <td>DATA</td>
                        <td>DATA</td>
                        <td>$editbttn</td>
                        <td>$deletebttn</td>
                    </tr>";
            }
        ?> </table>
        </body>

        </html>