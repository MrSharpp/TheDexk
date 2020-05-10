<?php          
include "includes/db.php";
                    $arrayurl = explode('/', $_SERVER['REQUEST_URI']);
                   
                    $post_id = $arrayurl[2];
                    $iddd = $post_id;
                    $slug = $arrayurl[3];
                    $query = "SELECT * FROM posts WHERE post_id = $post_id AND slug ='$slug'";
                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result) == 0) { 
                        header("Location:" . $fzf);}
 
                    $row = mysqli_fetch_assoc($result);

                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_imagea = $row['post_image'];
                    $post_category_id = $row['post_category_id'];
                    $post_tags = $row['post_tags'];
                    $content = $row['content'];
                    $post_views_count = $row['post_views_count'];
                    $post_likes = $row['post_likes'];
                    $post_description = $row['description'];


$page_title = $post_title . ' - ' . 'BlogTimes';
$page_description = $post_description;
$page_tags = $post_tags;
$page_author = $post_author;
$page_url = "http://blogtimes.thedexk.com/post.php/" . $post_id . '/' . $slug;

$page_image = "http://blogtimes.thedexk.com/images/" . $post_imagea;
include "includes/header.php";
?>
<?php include "includes/functions.php"; ?>
  
<!-- Navigation -->
<?php include "includes/navigation.php";  ?>

<style type="text/css">
    img {
    max-width: 100%;
    height: auto;
    }
</style>

 
        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h2> <?php echo $post_title; ?> </h2>
                            <ul class="list-unstyled mt-4">
                                <li class="list-inline-item h6 user text-muted mr-2"><i class="mdi mdi-account"></i> <?php echo $post_author; ?></li>
                                <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i> <?php echo $post_date; ?></li>
                            </ul>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog Post</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div><!--end col-->
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

        <!-- Blog STart -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <!-- BLog Start -->
                    <div class="col-lg-8 col-md-6">
                        <div class="card blog blog-detail border-0 shadow rounded">
                            <img src="<?php echo $url; ?>images/<?php echo $post_imagea; ?>" style="height: 400px;" class="img-fluid rounded-top" alt="">
                            <div class="card-body content">
                                <h6><i class="mdi mdi-tag text-primary mr-1"></i><?php echo $post_tags; ?></h6>
                               <?php echo $content;  ?>
                              
                            </div>
         
                             <div class="post-meta ml-3 mb-3 " >
                                    <div class="like-content"> 
                                          <button class="btn-secondarya like-review" style="margin-bottom: 20px;">
                                            <i class="mdi mdi-heart" aria-hidden="true" id="likeButton"></i> Like
                                         </button>
                                         
                                         <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                          
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_copy_link"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_telegram"></a>
                                    <a class="a2a_button_google_gmail"></a>
                                        
                                    </div>
                                    </div>
                            </div>

                            <style type="text/css">
                                                .like-content .btn-secondarya {
                                          display: block;
                                          margin: 40px auto 0px;
                                        text-align: center;
                                        background: #ed2553;
                                        border-radius: 3px;
                                        box-shadow: 0 10px 20px -8px rgb(240, 75, 113);
                                        padding: 10px 17px;
                                        font-size: 18px;
                                        cursor: pointer;
                                        border: none;
                                        outline: none;
                                        color: #ffffff;
                                        text-decoration: none;
                                        -webkit-transition: 0.3s ease;
                                        transition: 0.3s ease;
                                        }
                                        .like-content .btn-secondarya:hover {
                                              transform: translateY(-3px);
                                        }
                                        .like-content .btn-secondarya .fa {
                                              margin-right: 5px;
                                        }
                                        .animate-like {
                                            animation-name: likeAnimation;
                                            animation-iteration-count: 1;
                                            animation-fill-mode: forwards;
                                            animation-duration: 0.65s;
                                        }
                                        @keyframes likeAnimation {
                                          0%   { transform: scale(30); }
                                          100% { transform: scale(1); }
                                        }
                            </style>
                            
                        </div>
        <div id="disqus_thread"></div>

                        <div class="card shadow rounded border-0 mt-4">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Related Posts :</h5>

                                <div class="row">
                                    <?php 

                                    $query = "SELECT * FROM posts WHERE post_status = 'published' AND post_tags LIKE '%$post_tags%' OR post_title LIKE '%$post_title%' OR post_category_id = '$post_category_id' LIMIT 6";
                                     $result = mysqli_query($connection, $query); 
                                if (!$result)  die(mysqli_error($connection)); 
                                $row_count = mysqli_num_rows($result);
                                if ($row_count == 1){
                                    $query = "SELECT * FROM posts ORDER BY post_id desc LIMIT 6";
                                    $result = mysqli_query($connection, $query); 
                                }   
                             
                            while($row = mysqli_fetch_assoc($result)){
                                $postid = $row['post_id'];
                                if($postid == $post_id) {continue;}
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_slug = $row['slug'];
                                $post_image = $row['post_image'];
                 
                                $post_views_count = $row['post_views_count'];
                                $post_likes = $row['post_likes'];


                                     ?>
                                    <div class="col-lg-6 mt-4 pt-2">
                                        <div class="card blog rounded border-0 shadow">
                                            <div class="position-relative">
                                                <img src="<?php echo $url; ?>images/<?php echo $post_image; ?>" style="height: 188.72px" class="card-img-top rounded-top" alt="...">
                                            <div class="overlay rounded-top bg-dark"></div>
                                            </div>
                                            <div class="card-body content">
                                                <h5><a href="<?php echo $url; ?>post.php/<?php echo $postid; ?>/<?php echo $post_slug; ?>" class="card-title title text-dark"><?php echo $post_title; ?></a></h5>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-eye-outline mr-1"></i><?php echo $post_likes; ?></a></li>

                                                    </ul>
                                                     <a href="<?php echo $url; ?>post.php/<?php echo $postid; ?>/<?php echo $post_slug; ?>" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <small class="text-light user d-block"><i class="mdi mdi-account"></i><?php echo $post_author; ?></small>
                                                <small class="text-light date"><i class="mdi mdi-calendar-check"></i><?php echo $post_date; ?></small>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    
                                   <?php } ?>
                                </div><!--end row-->
                            </div>
                        </div>

                    </div>
                    <!-- BLog End -->

                    <!-- START SIDEBAR -->
                    <?php include "includes/sidebar.php"; ?>
                    <!-- END SIDEBAR -->

                    
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Blog End -->

     <?php include "includes/footer.php"; ?>
     
     <script type="text/javascript">
         $(document).ready(function(){
            $.ajax({
                method: 'POST',
                url: '<?php echo $url;?>includes/view.php',
                data: {id: '<?php echo $arrayurl["2"]; ?>'}
            });
         });
     </script>

     <script type="text/javascript">
                                $(function(){
                                    $(document).one('click', '.like-review', function(e) {
                                        $(this).html('<i class="fa fa-heart" aria-hidden="true"></i> Thank You!');
                                        $(this).children('.fa-heart').addClass('animate-like');
                                        $.ajax({
                                            method: 'POST',
                                            url: '<?php echo $url; ?>includes/like.php',
                                            data: {id: '<?php echo $arrayurl["2"]; ?>' },

                                        })
                                    });
                                });
                            </script>
                            
                            <script>
                                $(document).ready(function(){$("[data-f-id]").remove() });
                            </script>

 <script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://thedexk.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

                            