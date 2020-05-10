 <!-- START SIDEBAR -->
                    <div class="col-lg-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 sidebar sticky-bar rounded shadow">
                            <div class="card-body">
                                <!-- SEARCH -->
                                <div class="widget mb-4 pb-2">
                                    <h4 class="widget-title">Search</h4>
                                    <div id="search2" class="widget-search mt-4 mb-0">
                                        <form  method="GET" action="<?php echo $url; ?>search_result.php" class="searchform">
                                            <div>
                                                <input type="text" class="border rounded" name="search_keyword" id="s" placeholder="Search Keywords..." value="<?php if(isset($search_keyword)) echo $search_keyword; ?>">
                                                <input type="submit" name="search_btn"  id="searchsubmit" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- SEARCH -->
    
                                <!-- CATAGORIES -->
                                <div class="widget mb-4 pb-2">
                                    <h4 class="widget-title">Catagories</h4>
                                    <ul class="list-unstyled mt-4 mb-0 blog-catagories">
                                       <li><a href="http://blogtimes.thedexk.com/category.php?category=19">Covid 19</a></li>
                                        <li><a href="http://blogtimes.thedexk.com/category.php?category=25">Web Development</a></li>
                                        <li><a href="http://blogtimes.thedexk.com/category.php?category=18">Health and Hygiene</a></li>
                                        <li><a href="http://blogtimes.thedexk.com/category.php?category=13">Crush/Relationship Goals</a></li>
                                        <li><a href="http://blogtimes.thedexk.com/category.php?category=14">Career/Job/ Recruitment</a></li>
                                    </ul>
                                </div>
                                <!-- CATAGORIES -->
    
                                <!-- RECENT POST -->
                                <div class="widget mb-4 pb-2">
                                    <h4 class="widget-title">Recent Post</h4>
                                    <div class="mt-4">
                                        
                                        <?php
                                        // $query_rp = "SELECT * FROM posts WHERE post_status = 'published'";
                                        // $result_rp = mysqli_query($connection, $query_rp);
                                        // if(!$result_rp) die(mysqli_error($connection));
                                        // $count_rp = mysqli_num_rows($result_rp);
                                    
                                        // if ($count_rp < 1)  echo "<h2>No Recent Posts!!</h2>";
                                        // else {            
                                        $query_xp = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id desc LIMIT 3";
                                        $result_xp = mysqli_query($connection, $query_xp);
                                        if(!$result_xp) die(mysqli_error($connection));
                                        while($row_xp = mysqli_fetch_assoc($result_xp)){
                                            $post_id = $row_xp['post_id'];
                                            $post_title = $row_xp['post_title'];
                                            $post_date = $row_xp['post_date'];
                                            $post_slug = $row_xp['slug'];
                                            $post_image = $row_xp['post_image'];
                                    ?>

                                        <div class="clearfix post-recent">
                                            <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="<?php echo $url; ?>images/<?php echo $post_image; ?>" style="height: 50.31px" class="img-fluid rounded"></a></div>
                                            <div class="post-recent-content float-left"><a href="<?php echo $url . 'post.php/' .$post_id . '/' . $post_slug  ?>"><?php echo $post_title; ?></a><span class="text-muted mt-2"><?php echo $post_date; ?></span></div>
                                        </div>
                                     
                                    <?php } ?>

                                    </div>
                                </div>
                                <!-- RECENT POST -->
    
                              
                                
                                <!-- SOCIAL -->
                                <div class="widget">
                                    <h4 class="widget-title">Follow us</h4>
                                    <ul class="list-unstyled social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="https://www.facebook.com/thedexkweb" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/thedexk" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <!--<li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>-->
                                        <!--<li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>-->
                                        <!--<li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>-->
                                        <!--<li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>-->
                                        <!--<li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>-->
                                    </ul><!--end icon-->
                                </div>
                                <!-- SOCIAL -->
                            </div>
                        </div>
                    </div><!--end col-->
                    <!-- END SIDEBAR -->    









