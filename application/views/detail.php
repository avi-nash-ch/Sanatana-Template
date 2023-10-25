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

        <div class="row g-5">
            <div class="col-md-12">
                <?php if($this->session->flashdata('msg')) :?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('msg') ;?>
                </div>
                <?php endif ;?>
                <h3 class="pb-3 pt-3 mb-4 fst-italic border-bottom bg-light">
                    Sanatan Blog Detail
                </h3>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1"><?php echo $blog['title'] ;?></h2>
                    <p class="blog-post-meta"><?php echo $blog['created_at'] ;?> by <a
                            href="#"><?php echo $blog['author'] ;?></a></p>
                    <p class="text-justify"><?php echo $blog['description'] ;?></p>
                </article>
            </div>

            <div class="col-md-6 comment-box">
                <form name="commentForm" id="commentForm" method="post"
                    action="<?php echo base_url('home/blogDetail/'. $blog['blog_id']) ;?>">
                    <h3 class="pb-2">Pleasee comment here!</h3>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' :'';?> "
                            value="<?php echo set_value('name') ;?>" placeholder="Enter Name">
                        <?php echo form_error('name') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea name="comment" id="comment"
                            class="form-control text-justify <?php echo (form_error('comment') != "") ? 'is-invalid' :'';?>"
                            rows="5" placeholder="Enter your comment"><?php echo set_value('comment') ;?></textarea>
                        <?php echo form_error('comment') ;?>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url() ;?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
            <div class="col-md-12 pb-3">
                <h3 class="mt-1 pb-2 pt-2">Comments</h3>
                <hr>
                <?php if(!empty($comments)) :?>
                <?php foreach ($comments as $comment) :?>
                <div class="wrapper">
                    <div class="name"><b><?php echo $comment['name'] ;?></b> <span class="text-muted"
                            style="font-size: 12px;"> <?php echo $comment['created_at'] ;?></span></div>
                    <div class="comment"><?php echo $comment['comment'] ;?></div>
                </div>
                <hr>
                <?php endforeach ;?>
                <?php else :?>
                No Comment yet
                <?php endif ;?>

            </div>
        </div>
    </main>
</body>

</html>