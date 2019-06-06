<?php $this->layout('layouts/layouts', ['title' => 'Главная страница', 'name' => $name]) ?>


<div class="kotha-default-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php foreach ($posts as $post): ?>
                <article class="single-blog">
                    <div class="post-thumb">
                        <a href="#"><img src="/../public/front/images/posts/<?=$post['photo']?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header text-center text-uppercase">
                            <a href="#" class="post-cat"><?=$post['category'] ?></a>
                            <h2><a href="show.html?id=<?=$post['id'] ?>"><?=$post['title'] ?></a></h2>
                        </div>
                        <div class="entry-content">
                                <p><?=$this->e($post['text'], 'mb_substr') ?></p>
                        </div>
                        <div class="continue-reading text-center text-uppercase">
                            <a href="show.html?id=<?=$post['id'] ?>">Continue Reading</a>
                        </div>
                        <div class="post-meta">
                            <ul class="pull-left list-inline author-meta">
                                <li class="author">Автор <a href="#"><?=$post['author']?></a></li>
                                <li class="date"><?=$post['data']?></li>
                            </ul>
                            <ul class="pull-right list-inline social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
                <article class="single-blog">
                    <div class="post-thumb">
                        <div id="blog-gallery-slider" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item">
                                    <a href="#"><img src="images/post-thumb-8.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="#"><img src="images/post-thumb-9.jpg"  alt=""></a>
                                </div>
                                <div class="item active">
                                    <a href="#"> <img src="images/post-thumb-7.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#blog-gallery-slider" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right carousel-control" href="#blog-gallery-slider" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="entry-header text-center text-uppercase">
                            <a href="#" class="post-cat">Slider</a>
                            <h2><a href="single-page.html">Awesome slider post</a></h2>
                        </div>
                        <div class="entry-content">
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Sed
                                diam nonumy eirmod
                                tempor invidunt ut labore et dolore magna aliquyam erat, Lorem ipsum dolor sit amet,
                                consetetur
                                sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                                aliquyam erat, sed
                                diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. sed diam
                                voluptua Lorem ipsum
                                dolor sit sadipscing elitr amet, consetetur ...</p>
                        </div>
                        <div class="continue-reading text-center text-uppercase">
                            <a href="single-page.html">Continue Reading</a>
                        </div>
                        <div class="post-meta">
                            <ul class="pull-left list-inline author-meta">
                                <li class="author">By <a href="#">Jennifer </a></li>
                                <li class="date"> On March 17, 2017</li>
                            </ul>
                            <ul class="pull-right list-inline social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <div class="post-pagination  clearfix">

                    <ul class="pagination">
                        <?php if ($paginator->getPrevUrl()): ?>
                            <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Previous</a></li>
                        <?php endif; ?>

                        <?php foreach ($paginator->getPages() as $page): ?>
                            <?php if ($page['url']): ?>
                                <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                                </li>
                            <?php else: ?>
                                <li class="disabled"><span><?php echo $page['num']; ?></span></li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($paginator->getNextUrl()): ?>
                            <li><a href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="kotha-sidebar">

                    <?php if ($name != null): //если вошел как пользователь?>
                        <aside class="widget about-me-widget  text-center">
                            <div class="about-me-content">
                                <div class="about-me-img">
                                    <img src="images/me.jpg" alt="" class="img-me img-circle">
                                    <h2 class="text-uppercase"><?=$name ?></h2>
                                    <p><?=$name ?> is an enthusiastic and passionate Story Teller. He loves to do different
                                        home-made things
                                        and share to the world.</p>
                                </div>
                            </div>
                            <div class="social-share">
                                <ul class="list-inline">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </aside>
                    <?php endif; ?>
                    <aside class="widget news-letter-widget">
                        <h2 class="widget-title text-uppercase text-center">Get Newsletter</h2>
                        <form action="#">
                            <input type="email" placeholder="Your email address" required>
                            <input type="submit" value="Subscribe Now"
                                   class="text-uppercase text-center btn btn-subscribe">
                        </form>
                    </aside>
                    <!--популярные посты-->
                    <aside class="widget widget-popular-post">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
                        <ul>
                            <?php foreach ($most_popular as $popular): ?>
                                <li>
                                    <a href="/show.html?id=<?=$popular['id'] ?>" class="popular-img"><img src="/../public/front/images/posts/<?=$popular['photo']?>" alt="<?=$popular['alt'] ?>">
                                    </a>
                                    <div class="p-content">
                                        <h4><a href="/show.html?id=<?=$popular['id'] ?>" class="text-uppercase"><?=$popular['title'] ?></a></h4>
                                        <span class="p-date"><?=$popular['data'] ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                    <!--/популярные статьи  -->

                    <aside class="widget latest-post-widget">
                        <h2 class="widget-title text-uppercase text-center">Latest Posts</h2>
                        <ul>
                            <?php foreach ($latest_post as $latest): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a href="show.html?id=<?=$latest['id'] ?>" class="popular-img"><img src="/../public/front/images/posts/<?=$latest['photo']?>" alt="">
                                        </a>
                                    </div>
                                    <div class="latest-post-content">
                                        <h2 class="text-uppercase"><a href="show.html?id=<?=$latest['id'] ?>"><?=$latest['title'] ?></a></h2>
                                        <p><?=$latest['data'] ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                    <aside class="widget insta-widget">
                        <h2 class="widget-title text-uppercase text-center">INSTAGRAM FEED</h2>
                        <div class="instagram-feed">
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-1.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-6.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-4.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-3.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-7.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="images/ft-insta-8.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget add-widget">
                        <h2 class="widget-title text-uppercase text-center">Advertisement</h2>

                        <div class="add-image">
                            <a href="#"><img src="images/add-image.jpg" alt=""></a>
                        </div>
                    </aside>
                </div>
            </div>



        </div>
    </div>
</div>
<div class="container-fluid insta-feed text-center">
    <h2 class="text-uppercase">Follow@ <a href="#">Instagram</a></h2>
    <div id="footer-instagram" class="footer-insta">
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-1.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-2.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>

        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-3.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>

        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-4.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-5.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-6.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-7.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="images/ft-insta-8.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
    </div>
</div>