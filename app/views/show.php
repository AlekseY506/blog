<?php $this->layout('layouts/layouts', ['title' => 'Show page', 'name' => $name]) ?>

<div class="kotha-default-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- articles -->
                <article class="single-blog">
                    <div class="post-thumb">
                        <img src="/../public/front/images/posts/<?=$post['photo']?>" alt="">
                    </div>
                    <div class="post-content">
                        <div class="entry-header text-center text-uppercase">
                            <a href="#" class="post-cat"><?=$post['category']?></a>
                            <h2><?=$post['title']?></h2>
                        </div>
                        <div class="entry-content">
                            <?=$post['text'] ?>
                        </div>

                        <div class="post-meta">
                            <ul class="pull-left list-inline author-meta">
                                <li class="author">By <a href="#"><?=$post['author'] ?> </a></li>
                                <li class="date"><?=$post['data'] ?></li>
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
                <!--end articles -->
                <div class="top-comment"><!--top comment-->
                    <img src="images/comment.jpg" class="pull-left img-circle" alt="">
                    <h4><a href="#">Ricard Goff</a></h4>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                        invidunt ut labore et dolore magna aliquyam erat.</p>
                    <ul class="list-inline social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="row"><!--blog next previous-->
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="images/blog-next-1.jpg" alt="">
                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5>A Good Thought Never be false</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="images/blog-next-2.jpg" alt="">
                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class="pull-right fa fa-angle-right"></i></p>
                                        <h5>The Reason Why Everyone Love Hill</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="related-post-carousel"><!--related post carousel-->
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="related-post-carousel-items">
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-1.jpg" alt="">
                                <h4>Lorem ipsum dolor sit amet,</h4>
                            </a>
                        </div>
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-2.jpg" alt="">
                                <h4>Just Wondering at Beach</h4>
                            </a>
                        </div>
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-3.jpg" alt="">
                                <h4>Nonumy eirmod tempor invidunt</h4>
                            </a>
                        </div>
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-1.jpg" alt="">
                                <h4>Justo duo dolores et ea rebum</h4>
                            </a>
                        </div>
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-2.jpg" alt="">
                                <h4>Duo dolores justo t ea rebum</h4>
                            </a>
                        </div>
                        <div class="single-item">
                            <a href="#">
                                <img src="images/p-3.jpg" alt="">
                                <h4>Duo dolores justo t ea rebum</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (!$comments): ?>
                    <div class="comment-area">
                        <h3>Вы можете первым оставить комментарий</h3>
                    </div>
                <?php else: ?>
                <div class="comment-area">

                    <?php foreach($comments as $comment): ?>
                        <div class="single-comment">
                            <div class="media">
                                <div class="media-left text-center">
                                    <a href="#"><img class="media-object" src="images/reply-1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3 class="text-uppercase">
                                            <a href="#"><?=$comment['name'] ?></a>
                                            <a href="#" class="pull-right reply-btn">reply</a>
                                        </h3>
                                    </div>
                                    <p class="comment-date">
                                        <?=$comment['data'] ?>
                                    </p>
                                    <p class="comment-p">
                                        <?=$comment['message'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

                <?php endif; ?>
                <!--leave comment-->
                <div class="leave-comment">
                    <h4>Leave a reply</h4>
                    <?php if ($name): ?>
                    <form class="form-horizontal contact-form"   method="post" action="add-comment.html">
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <input type="hidden" name="post_id" value="<?=$_GET['id']?>">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="6" name="message" placeholder="Write Massage" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Post Comment</button>
                    </form>
                    <?php else: ?>
                        <?php echo "Только зарегистрированные пользователи могут оставлять комментарий!"?>
                    <?php endif; ?>
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