<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Blog Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
    <!-- Bootstrap core CSS -->
     <link href="http://localhost/blog/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/css/blog.css'; ?>" rel="stylesheet">
    <link href="http://localhost/blog/assets/css/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12">
            <a class="blog-header-logo text-dark" href="#">Simple Blog Application in Codeigniter.</a>
          </div>
          </div>
      </header>
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-12 px-0">
          <h1 class="display-4 font-italic"><?php echo $promoBlog['title'] ?></h1>
          <p class="lead my-3"><?php echo $promoBlog['description'] ?></p>
          <p class="lead mb-0"><a href="<?php echo base_url(). 'home/blogDetails/'.$promoBlog['blog_id']; ?>" class="text-white font-weight-bold">Read More......</a></p>
        </div>
        </div>
      <div class="row mb-2">
          <?php foreach ($featuredBlogs as $featureBlog) { ?>
            <div class="col-md-6">
              <div class="card-body d-flex flex-column align-items-start">
                  <h3 class="mb-0">
                <a class="text-dark" href="#"><?php echo $featureBlog['title'] ?></a>
                  </h3>
                  <div class="mb-1 text-muted"><?php echo ($featureBlog['created_at']); ?></div>
                  <p class="card-text mb-auto"><?php echo word_limiter($featureBlog['description'],30) ?></p>
                  <a href="<?php echo base_url(). 'home/blogDetails/'.$featureBlog['blog_id']; ?>">Read More.....</a>
              </div>
            </div>
         <?php } ?>        
      </div>
    </div>
  <main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main mT1">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Our Blog
          </h3>
          <?php foreach ($allBlogs as $blog) { ?>
          <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $blog ['title']; ?></h2>
              <p class="blog-post-meta"> <?php echo $blog ['created_at']; ?> by <a href="#"> <?php echo $blog ['author']; ?></a></p>
              <?php echo $blog['description']; ?>
              <a href="<?php echo base_url(). 'home/blogDetails/'.$featureBlog['blog_id']; ?>">Read More.....</a>
            </div>
            </div><!-- /.blog-post -->
          <?php } ?>
        </div><!-- /.blog-main -->
    </div><!-- /.row -->
  </main><!-- /.container -->
</body>
</html>
