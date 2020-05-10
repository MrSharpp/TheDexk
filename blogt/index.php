
<?php
// Here is updated one
$page_title = "BlogTimes - Aligarh | Blog Times Home Page";
$page_description = "BlogTimes Enlightening your journey to enchanting destinations to inspire you, influence you and to enhance your knowledge and make you become better than  yesterday. BlogTimes";
$page_tags = "blog , aligarh blog, aligarh news, thedexk, blogtimes, time, blogtime, blog time";
$page_author = 'BlogTimes.';
$page_url = "http://blogtimes.thedexk.com";
$page_image = "http://blogtimes.thedexk.com/images/abk.jpeg";
include 'includes/header.php';
?>
                   
<?php include "includes/functions.php"; ?>
   
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title"> One of the most powerful place to influence you, to inspire you and to make you better than yesterday </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->
        
        <!--Blog Lists Start-->
        <section class="section">
            <div class="container">
                <div class="row">

                    <!-- Blog Post Start -->
                    <div class="col-lg-8 col-12">
                        <div class="row">

                    <?php
            $post_per_page = 5;
            if (isset($_GET['page'])) $page = $_GET['page'];
            else  $page = 0;
            if ($page == 0 || $page == 1) $page_1 = 0;
            else $page_1 = ($page * $post_per_page) - $post_per_page;
            
            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $result = mysqli_query($connection, $query);
            if(!$result) die(mysqli_error($connection));
            $count = mysqli_num_rows($result);
            $count = ceil($count / $post_per_page);
        
            if ($count < 1)  echo "<h2>No Posts Available !!</h2>";
            else {            
            $query = "SELECT * FROM posts WHERE post_status = 'published'  ORDER BY post_id DESC LIMIT $page_1,$post_per_page";
            $result = mysqli_query($connection, $query);
            if(!$result) die(mysqli_error($connection));
            $countt = mysqli_num_rows($result);
            if($countt == 0) header('Location:' . $fzf);
            while($row = mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $slug = $row['slug'];
                $post_image = $row['post_image'];
                $post_content_excerpt = $row['description'];
                $post_views_count = $row['post_views_count'];
                $post_likes = $row['post_likes'];
        ?>

                            <div class="col-12 mb-4 pb-2">
                                <div class="card blog rounded border-0 shadow overflow-hidden">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-md-6">
                                            <img src="images/<?php echo $post_image; ?>" style="height: 301px;width:365px;" class="img-fluid" alt="">
                                            <div class="overlay bg-dark"></div>
                                            <div class="author">
                                                <small class="text-light user d-block"><i class="mdi mdi-account"></i> <?php echo $post_author; ?></small>
                                                <small class="text-light date"><i class="mdi mdi-calendar-check"></i> <?php echo $post_date; ?> </small>
                                            </div>
                                        </div><!--end col-->
        
                                        <div class="col-md-6">
                                            <div class="card-body content">
                                                <h5><a href="post.php/<?php echo $post_id; ?>/<?php echo $slug; ?>" class="card-title title text-dark"><?php echo $post_title; ?></a></h5>
                                                <p class="text-muted mb-0"><?php echo $post_content_excerpt; ?></p>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-eye-outline mr-1"></i><?php echo " ".$post_views_count; ?></a></li>
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-heart-outline mr-1"></i><?php echo " ".$post_likes; ?></a></li>
                                                    </ul>
                                                    <a href="post.php/<?php echo $post_id; ?>/<?php echo $slug; ?>" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div> <!--end row-->
                                </div><!--end blog post-->
                            </div><!--end col-->
        
                                       <?php }} ?>
                                    </div> <!--end row-->
                                </div><!--end blog post-->
                                 <?php include "includes/sidebar.php"; ?>

                            </div><!--end col-->
        
                           
        
                            <!-- PAGINATION START -->
                            <div class="col-12">
                                    <!-- <ul class="pager">
                                        <?php
                                            for ($i = 1; $i<=$count; $i++) {
                                                if ($i == $page)  echo "<li class='page-item active'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                                                else  echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                                            }
                                        ?>
                                    </ul>   -->



                                <ul class="pagination justify-content-center mb-0">
                                    <?php 
                                    for ($i = 1; $i<=$count; $i++) {
                                        if($i == $page) echo '<li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                                        else echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                                     }
                                    ?>
                                </ul>

                            </div><!--end col-->
                            <!-- PAGINATION END -->
                        </div><!--end row-->
                    </div><!--end col-->
                    <!-- Blog Post End -->

                 
    

                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section -->
        <!--Blog Lists End-->

<?php include "includes/footer.php"; ?>