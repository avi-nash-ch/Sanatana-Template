<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Sanatan Template</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/blog.css') ;?>">
</head>

<body>

    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-md-12 text-center">
                    <a class="blog-header-logo text-dark" href="#">Hindu Dharma Blog in Codeigniter</a>
                </div>
            </div>
        </header>

    </div>

    <main class="container">
        <div class="p-md-5 mb-4 rounded text-white bg-dark ">
            <div class="col-md-12 px-0">
                <h1 class="display-4 font-italic"><?php echo $promoBlogs['title'] ;?></h1>
                <p class="lead my-3 text-justify"><?php echo word_limiter($promoBlogs['description'], 70) ;?></p>
                <p class="lead mb-0"><a href="<?php echo base_url('home/blogDetail/'.$promoBlogs['blog_id']) ;?>"
                        class="text-body-emphasis fw-bold">Read more...</a></p>
            </div>
        </div>


        <div class="row mb-2">
            <?php $count = 0; ?>
            <?php foreach ($featuredBlogs as $featuredBlog) : ?>
            <?php if ($count < 2) : ?>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"><?php echo $featuredBlog['title']; ?></h3>
                        <div class="mb-1 text-body-secondary"><?php echo date($featuredBlog['created_at']); ?></div>
                        <p class="card-text mb-auto text-justify">
                            <?php echo word_limiter($featuredBlog['description'], 30); ?></p>
                        <a href="<?php echo base_url('home/blogDetail/'.$featuredBlog['blog_id']); ?>"
                            class="stretched-link">Read more...</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php $count++; ?>
            <?php endforeach; ?>
        </div>


        <div class="row g-5">
            <div class="col-md-12">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Our Sanatan Blog
                </h3>

                <?php foreach ($allBlogs as $blog) : ?>
                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1"><?php echo $blog['title'] ;?></h2>
                    <p class="blog-post-meta"><?php echo $blog['created_at'] ;?> by <a
                            href="#"><?php echo $blog['author'] ;?></a></p>
                    <p class="text-justify"><?php echo word_limiter($blog['description'], 35) ;?><a
                            href="<?php echo base_url('home/blogDetail/'.$blog['blog_id']) ;?>"
                            class="stretched-link">Read more...</a></p>
                </article>
                <hr>
                <?php endforeach ;?>
                <!-- Pagination Links -->
                <nav class="blog-pagination" aria-label="Pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
        </div>
    </main>
</body>

</html>