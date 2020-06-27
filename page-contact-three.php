<?php
$title = 'Contact - TheDexk';
$siteColor = 'dark';
include 'header.php';

?>

        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100" style="background: url('images/45.jpg') center center;">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title">Contact Us</h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Start Contact -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5">
                                <h4 class="card-title">Get In Touch !</h4>
                                <div class="custom-form mt-4">
                                    <div id="message"></div>
                                    <form method="POST" id="cform" onsubmit="return submitForm()">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Your Name <span class="text-danger">*</span></label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                    <input name="name" id="name" type="text" class="form-control pl-5" placeholder="First Name :">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Your Email <span class="text-danger">*</span></label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                    <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :">
                                                </div> 
                                            </div><!--end col-->
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Subject</label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book fea icon-sm icons"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                                    <input name="reason" id="subject" type="text" class="form-control pl-5" placeholder="Subject">
                                                </div>                                                                               
                                            </div><!--end col-->
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Comments</label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control pl-5" placeholder="Your Message :"></textarea>
                                                </div>
                                            </div>
                                        </div><!--end row-->
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary btn-block" value="Send Message">
                                                <div id="simple-msg"></div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form--> 
                                </div><!--end custom-form-->
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <img src="images/contact.png" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div><!--end col-->
                </div>
            </div><!--end container-->
            
           
        </section><!--end section-->
        <!-- End contact -->

<footer class="footer bg-light">
    <div class="container">
        <div class="row">


<?php include 'footer.php' ?>

   <script type="text/javascript">
    function submitForm() {
    $('#submit').prop('disabled', true);
    $.ajax({
        url: './php/contact.php',
        type: 'POST',
        data: $('#cform').serialize(),
        success: function(res){
            alert(res)
            if(res == 'Message has been sent. We will reply back soon')
            {
                window.location.reload()
            }
            $('#submit').prop('disabled', false);
        }
    })
    return false;
    }

   </script>