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
    <!-- CSS only -->
    <link rel="stylesheet" href="src/styles/boostrap/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body style="background: #ffff;">
<div class="header" style="background: url(images/banner.jpg); background-size: cover;">
    <div id="overlay" style="background: rgba(0,0,0,0.3); height: 100vh;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#" style="font-family: 'Allura', cursive; font-weight: 800; font-size: 2.3em;">El Pueblo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#" style="font-family: 'Poppins', sans-serif; font-size: 1em;">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#About" style="font-family: 'Poppins', sans-serif; font-size: 1em;">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#Faq" style="font-family: 'Poppins', sans-serif; font-size: 1em;">FAQ</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container d-flex flex-column justify-content-center" style="margin-top: 8em;">
            <p class="display-2 text-white" style="font-family: 'Poppins', sans-serif;">Welcome to El Pueblo</p>
            <p class="display-2 text-white" style="font-family: 'Poppins', sans-serif;">Condormitel</p>
            <p class="h5 text-white" style="font-family: 'Poppins', sans-serif;">Lorem ipsum, dolor sit amet consectetur.</p>
            <span>
            <a href="" class="btn btn-dark mt-5" style="font-family: 'Poppins', sans-serif; border-radius: 0;">Get Started</a>
            </span>
        </div>
    </div>
</div>

<!-- hoverable cards // hover tapos magooverlay yung "view model" -->
<section class="bg-white vh-100" style="position:relative; ">
    <div class="container bg-white shadow" style="position:absolute; margin-top:-2em; left: 50%; transform: translateX(-50%); border-radius: 8px">
        <div class="container d-flex flex-column justify-content-center align-items-center p-5">
            <p class="h2" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
                Our Best Residents
            </p>
            <hr class="featurette-divider" width="60%" style="opacity:1;">
        </div>
        <div class="row p-5 pt-1">
            <div class="col-xxl-4">
                <div class="card" style="border: none; background: url(images/rico.png); height:100%; background-size: cover;">
                    <div class="card-inner d-flex align-items-end" style="border:none; background: rgba(0,0,0,0.3); height:100%; z-index: 1111;">
                        <p class="h1 text-white" style="font-family: 'Allura', cursive; font-weight: 400;">-Bonito-</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card" style="border: none; background: url(images/amore2.jpg); height:100%; background-size: cover;">
                    <div class="d-flex align-items-end" style="border:none; background: rgba(0,0,0,0.3); height:100%; z-index: 1111;">
                        <p class="h1 text-white" style="font-family: 'Allura', cursive; font-weight: 400;">-Amore-</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4" style="height: 25em;">
                <div class="card" style="border: none; background: url(images/mema.jpg); height:100%; background-size: cover;">
                    <div class="d-flex align-items-end" style="border:none; background: rgba(0,0,0,0.3); height:100%; z-index: 1111;">
                        <p class="h1 text-white" style="font-family: 'Allura', cursive; font-weight: 400;">-Mucho-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <p class="text-center h3 mb-5" style="font-family: 'Poppins', sans-serif; font-weight: 700;"><u>Why Choose El Pueblo?</u></p>
        <div class="row d-flex justify-content-center align-items-center text-center">
            <div class="col-lg-6 p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-heart-fill text-primary" viewBox="0 0 16 20">
                        <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707L7.293 1.5Z"/>
                        <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9.293Zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/>
                        </svg>
                    </div>
                    <div class="col-lg-12">
                        <p class="h5">
                        Aesthetics and Convenience
                        </p>
                        <p>All condominium units are fully furnished which includes appliances. Discover Affordability and Convenience at Its Best!</p>
                    </div>
                </div>                
            </div>
            <div class="col-lg-6 p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="magenta" class="bi bi-heart-pulse-fill " viewBox="0 0 16 20">
                        <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
                        </svg>
                    </div>
                    <div class="col-lg-12">
                        <p class="h5">
                        Health and Wellness
                        </p>
                        <p>Seminars on alternative life-style for health maintenance are conducted.</p>
                    </div>
                </div>              
            </div>
            <div class="col-lg-6 p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-tree-fill text-success" viewBox="0 0 16 20">
                        <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/>
                        </svg>
                    </div>
                    <div class="col-lg-12">
                        <p class="h5">
                        Environmental
                        </p>
                        <p>El Pueblo is committed to responsible environmental stewardship. Wet and dry garbage recycling, preservation of trees adequate garden spaces, cross-ventilation promoting architecture, healthy dwelling units.</p>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</section>
    <!-- <section>
        <div class="card p-5">
        <strong>
            <p><u>WHY CHOOSE EL PUEBLO QUEZON CITY?</u></p>
            </strong>

            <label for=""> <b> Aesthetics and Convenience </b></label>

            <p>-All condominium units are fully furnished which includes appliances. Discover Affordability and Convenience at Its Best!</p>

            <label for=""><b> Environmental </b></label>

            <p>- El Pueblo is committed to responsible environmental stewardship. Wet and dry garbage recycling, preservation of trees adequate garden spaces, cross-ventilation promoting architecture, healthy dwelling units.</p>

            <label for=""> <b>  </b></label>

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

        </div>
    </section> -->
    <!-- unnecessary my friend -->
    
    <!-- gallery na lang to riri-
    <img src="images/1.jpg" alt="image" width="100px" height="100px">
    <img src="images/2.jpg" alt="image" width="100px" height="100px">
    <img src="images/3.jpg" alt="image" width="100px" height="100px">
    <img src="images/4.jpg" alt="image" width="100px" height="100px">
    <img src="images/5.jpg" alt="image" width="100px" height="100px">
    <img src="images/6.jpg" alt="image" width="100px" height="100px"> -->



    <!----eto sana yung sa scroll----->
    <!-- pwede bang i card mo na lang to riri?-->
    <!-- <h2>Get Started</h2>

        <label for="">Unit Model</label>
        <label for="">Type</label>
        <label for="">Image</label>



    <?php

        $query_select = "SELECT * FROM units LIMIT 3";
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

    ?> -->

    <div class="container my-5">
        <div class="row">
        <?php

        $query_select = "SELECT * FROM units";
        $run_select = mysqli_query($conn,$query_select);

        if(mysqli_fetch_array($run_select) > 0){
            foreach($run_select as $row){
                
                ?>
                <div class="col-lg-4">
                <div class="card">
                    <img src="<?php echo "Admins/uploads/". $row['image']?>" alt="Image" width="100px" height="200px" class="card-img-top">
                    <div class="card-body">
                        <p><?php echo 'Model: '.$row ['model']?></p>
                        <p><?php echo 'Type: '.$row ['type']?></p>
                        <br>
                        <a href="View-Unit/View-Unit.php?unit_id=<?php echo $row ['unit_id']?>">View Unit</a>
                    </div>
                </div>
                </div>
                
                    
                <?php
            }

        }

        ?>
        </div>
    </div>
    <section class="text-center container">
        <h2 id="Faq">FAQ</h2>
        <p>1. Can a buyer install an Airconditioning unit? What are the requirements?
            </p>
            <p>
            Yes, an air-conditioning unit can be installed subject to the following mandatory requirements:
            </p>
      
            <p> Installation of a canopy, together with the airconditioning unit.
            The approval by Management.
            Approval of the Developer or the authorized assigned party of the Developer as to type, design, location and manner of installation.
            Buyer shall shoulder the expense with regard to the canopy and its installation.</p>

           

        <p> 2. Is there a reservation fee? If so, how much? Does it form part of the Purchase Price?</p>
        <p> Yes, there is a reservation fee for Residential units amount of Php 15,000, Commercial units amount of Php 25,000 and Parking slots amount of Php 10,000. The purpose of the fee is to enable the buyer to reserve a unit for a period of 30 days. The reservation is not refundable and forms part of the purchase price.</p>

        <p> 3. How will the buyer pay the Equity?</p>
        <p>The equity shall be paid on equal monthly installments using postdated checks (PDC), which is mandatory, for a period depending on the terms chosen by the buyer. In case the purchased unit is ready for turnover, but the required equity has not been fully paid yet, the buyer has to pay the remaining balance of the equity and await the approval from the Bank Financing whichever is applicable before he/she could moves in.</p>

        <p>4. What are the other charges that I need to settle on top of the Total Contract Price?</p>
        <p>a). Transfer of Title which is approximately 6% of the Total Contract Price.</p>
        <p>b). Bank charges which is approximately 3% of the Loan Value.</p>
        <p> c). Move-in fees which covers the Electric service fee and water meter deposit amount of Php 12,500.</p>
        <p>d). Joining Fee and Monthly dues (Php 51 pesos per sqm)</p>
       
        <p> 5. How soon can a buyer move in the unit?</p>
        <p>The buyer can move-in to a completed unit upon:</p>
        <p>a). Completion of equity requirement and</p>
        <p> b). loan approval of any financing institution for the balance, if applicable or</p>
        <p> c). submission of all post-dated checks, if In-house financing</p>
        <p> d). payment of other charges and turn-over charges</p>
      
        <p> 6. What facilities/services can I expect at El Pueblo?</p>
        <p>El Pueblo One QC Swimming Pools, Sports Facilities (basketball court, badminton court, table-tennis court, jogging path) Convenience Store, Visitor’s Lobby, Office and Commercial Spaces, Drying Cage, Organic Landscaping, Free Piano & Art Lesson (for kids), activity area.</p>
        <p>  El Pueblo Manila Swimming Pools, Sports Facilities (basketball court, jogging path) Convenience Store, Visitor’s Lobby, office and Commercial Spaces, Drying Cage, Organic Landscaping, Free Piano & Art Lesson (for kids), activity area.</p>
        
        <p>7. Where and when can I see the model units?</p>
        <p>Our model units are located at El Pueblo Site located at Anonas St., Sta. Mesa Manila right beside PUP Main Campus and at #44 King Christian St., Kingspoint Subd. Novaliches, Quezon City. These can be viewed everyday from Monday to Sunday from 9:00AM to 6:00PM. During holidays, please call the office for proper scheduling. And also you can visit head office located at the unit 801 One Park Drive Bldg. 9 th ave. corner 11 th drive BGC. Taguig.</p>
        <p> 8. Can the unit be opened for lease?</p>
        <p> The unit can be opened for lease subject to the limitations and restrictions provided for in the Master Deed with Declaration of Restrictions.</p>
        <p>9. Is the water and electric meter included in the total contract price?</p>
        <p> No</p>
        <p>10. Is there a discount if the unit is paid for in cash?</p>
        <p> Yes. A discount of 7% shall be given to buyers who will pay in spot cash. Please contact your broker or our office for the details and latest promo discounts.</p>

        <p>  11. What if I defaulted in payment of any of the installment fee?</p>
        <p> In case of default, the full amount becomes due, payable and demandable. The seller may cancel or rescind the contract or demand the full amount of the total principal sum together with the penalties for default.</p>
       
     
       <p>12. Will there be a grace period for payment in case of default?</p>
        <p>Yes, there is. After the Notice of Default, the buyer shall be given a sixty (60)-day grace period to pay the amount due. If payment has not been made after the grace period, a Notice of Cancellation shall be given, within 30 days after receipt of which, the buyer has to settle the amount due. If the buyer still fails to comply, the unit shall be offered to other prospective buyers.</p>

        <p>  13. What will happen if I don’t comply?</p>
        <p> Reservation and the contract to sell, maybe possibly cancelled and the previous installments paid by the buyer shall be forfeited in favor of the seller. The seller should not be obliged to refund payments made by the buyer subject only to the provisions of RA6552, known as the “Realty Installment Protection Act”.</p>
            

            <p> CLAUSE</p>
            <p>This FAQ shall form part of the Reservation Application executed by the buyer, hence the knowledge of both parties as to the content of this FAQ is valid and binding.</p>

            <h2 class="mt-5">About us</h2>
        <p class="mb-5">
       
        The Owner/Developer Ms. Grace B. Eleazar has been in the real estate business since 1983, concentrating on the high-end market, both for residential and business use. When she started Wholesome Lifestyle Supermarket. She became aware of this special niche of residential end-user market which is not effectively being addressed by other developers.

        El Pueblo is an offshoot of her passion to provide an upgraded standard of living for the majority of her employees. This bias towards an upliftment in lifestyle was translated into this unique concept of providing compact but decent, upgraded but highly affordable dwelling units.EL Pueblo's concepts were based on three major philosophies: Respect for nature, Lifestyle integration and Understanding of Human needs, which when put together will result in Quality of Life. El Pueblo is not just a home, but an environmentally sound upliftment in the standards of living of the urban work force. 
        </p>
    </section>

    <div class="footer" style="background: #4C707E; height: 60vh;">
        <div class="container p-5">
            <p class="h3 text-white" style="font-family: 'Poppins', sans-serif; font-weight: 500;">For Inquiries, Contact Us</p>
            <hr>
            <div class="row">
                <div class="col-xxl-12">
                    <p class="h5 text-white" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Phoenix Sun International Corp. Developer</p>
                    <p class="text-white p-0 m-1" style="font-family: 'Poppins', sans-serif; font-weight: 500;"><span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 18">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg></span> Main Office Address: Unit 801 One Park Drive Bldg. 9th Ave. corner 11th Drive Bonifacio Global City, Taguig City</p>
                    <p class="text-white m-1 p-0" style="font-family: 'Poppins', sans-serif; font-weight: 500;"><span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-google" viewBox="0 0 16 18">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                    </svg></span> sales.elpueblocondominium@gmail.com / info.elpueblomarketingdoc88@gmail.com</p>
                    
                    <p class="h5 text-white mt-5" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Manila Showroom</p>
                    <p class="text-white p-0 m-1" style="font-family: 'Poppins', sans-serif; font-weight: 500;"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 18">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg></span> Main Office Tel Nos. (02) 792-7910 / 09190088650</p>
                    <p class="text-white m-1 p-0" style="font-family: 'Poppins', sans-serif; font-weight: 500;"><span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 18">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg></span> Like us: https://www.facebook.com/elpueblocondormitel.Official</p>
                    
                </div>
                <div class="col-xxl-6">
                    <img src="images/" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

ob_end_flush();

?>