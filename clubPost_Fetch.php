<?php

        session_start();
        // if(isset($_GET['id']) AND !empty($_GET['id'])){
        //     $id = $_GET['id'];
        // }
        // else{
        //     if(isset($_SESSION['adminusername']) AND !empty($_SESSION['adminusername'])){
        //         $id = $_SESSION['adminusername'];
        //     }
        //     else{
        //         header("Location:adminLogin.php");
        //         exit;
        //     }
        // }
        $id = "011191156"

        
    ?> 
     <?php
                     try{
                        $conn=new PDO('mysql:host=localhost:3306;dbname=uiucms;','root','');
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                        
                        $sqlquerystring="SELECT * FROM users WHERE id ='$id'";
                        $returnobj=$conn->query($sqlquerystring); 
                         
                        if($returnobj->rowCount()==0){
                            header("location: dataNotFound.php");
                           
                           
                        } 
                        else{
                           
                            
                            
                            $tabledata=$returnobj->fetchAll();
                                foreach($tabledata AS $row)
                                {
                                    
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $dept = $row['dept'];                      
 
                                }
                                
                                
                            }
                            
                        
                        }
                    catch (PDOException $ex){
                    
                    }
                    
                    ?>

<?php
                     try{
                        $conn=new PDO('mysql:host=localhost:3306;dbname=uiucms;','root','');
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                        
                        $sqlquerystring="SELECT * FROM post WHERE user ='$id'";
                        $returnobj=$conn->query($sqlquerystring); 
                         
                        if($returnobj->rowCount()==0){
                            header("location: dataNotFound.php");
                           
                           
                        } 
                        else{
                           
                            
                            
                            $tabledata=$returnobj->fetchAll();
                                foreach($tabledata AS $row)
                                {
                                    
                                    $post_text = $row['post_text'];
                                    $total_reaction = $row['total_reaction'];
                                    $time = $row['time'];
                                                         
 
                                }
                                
                                
                            }
                            
                        
                        }
                    catch (PDOException $ex){
                    
                    }
                    
                    ?>