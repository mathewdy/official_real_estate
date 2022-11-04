<?php
session_start();
include('connection.php');
ob_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>El Pueblo Condormitel</h2>
    <h3>Pheonix Sun International Corp.</h3>
    <h3>La Bella Lifestyle Properties</h3>


    <!----carousel dito riri-- lima yung ilalagay ko dito na image na puro amenities ------->
    <!-- edit mo na lang yung size-->
    <img src="images/image_1.jpg" alt="image" width="100px" height="100px">
    <img src="images/image_2.png" alt="image" width="100px" height="100px">
    <img src="images/image_3.jpg" alt="image" width="100px" height="100px">
    <img src="images/image_4.png" alt="image" width="100px" height="100px">
    <img src="images/image_5.jpg" alt="image" width="100px" height="100px">


    <strong>
        <p><u>WHY CHOOSE EL PUEBLO QUEZON CITY?</u></p>
    </strong>

    <label for=""> <b> Aesthetics and Convenience </b></label>

    <p>-All condominium units are fully furnished which includes appliances. Discover Affordability and Convenience at Its Best!</p>

    <label for=""><b> Environmental </b></label>

    <p>- El Pueblo is committed to responsible environmental stewardship. Wet and dry garbage recycling, preservation of trees adequate garden spaces, cross-ventilation promoting architecture, healthy dwelling units.</p>

    <label for=""> <b> Health and Wellness </b></label>

    <p>-Seminars on alternative life-style for health maintenance are conducted.</p>

    <label for=""> <b> Community Workshops </b> </label>

    <p>-Los Pueblos is also providing community based enhancement programs for FREE. These are: Art Lessons, Piano Lessons, Dance Lessons, Sport Activities and Contests.</p>

    <label for=""><b>  Community Activities </b>  </label>  

    <p>-Communal Vegetable and Herb Garden planted and maintained by the community.</p>  

    <label for=""><b>  Cultural Activities  </b> </label>

    <p>-Painting, violin, piano and ballet lessons will be available to those who have shown interests to engage in these activities.</p>

    <label for=""> <b> Economic Opprtunities  </b></label>

    <p>-For the residents, livelihood seminars will be concentrated to create opportunities for augmenting their income. A commercial unit will be reserved for this purpose.</p>

    <label for=""><b>  Government </b> </label>

    <p>-Less spending for government transportation infrastructure due to less demands for roads linking business centers to suburban residential areas Promotes the concept of “You live where you work”</p>

    <!--gallery na lang to riri--->
    <img src="images/1.jpg" alt="image" width="100px" height="100px">
    <img src="images/2.jpg" alt="image" width="100px" height="100px">
    <img src="images/3.jpg" alt="image" width="100px" height="100px">
    <img src="images/4.jpg" alt="image" width="100px" height="100px">
    <img src="images/5.jpg" alt="image" width="100px" height="100px">
    <img src="images/6.jpg" alt="image" width="100px" height="100px">



    <!----eto sana yung sa scroll----->
    <!-- pwede bang i card mo na lang to riri?-->
    <h2>Get Started</h2>

        <label for="">Unit Model</label>
        <label for="">Type</label>
        <label for="">Image</label>

    <?php

                $query_select = "SELECT * FROM units";
                $run_select = mysqli_query($conn,$query_select);

                if(mysqli_fetch_array($run_select) > 0){
                    foreach($run_select as $row){
                        
                        ?>
                            <p><?php echo $row ['model']?></p>
                            <p><?php echo $row ['type']?></p>
                            <img src="<?php echo "Admins/uploads/". $row['image']?>" alt="Image" width="100px" height="100px">
                            <br>
                            <a href="View-Unit/View-Unit.php?unit_id=<?php echo $row ['unit_id']?>">View Unit</a>
                            



                        <?php
                    }
                
                }

            ?>
</body>
</html>

<?php

ob_end_flush();

?>