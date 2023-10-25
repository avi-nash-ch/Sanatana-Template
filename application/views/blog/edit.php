<?php $this->load->view('header') ;?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3">
                <h1 class="h2">Edit Blog</h1>
                <hr>
                <form name="editForm" id="editForm" method="post" action="<?php echo base_url('blog/edit/'.$blog['blog_id']) ;?>">
                    <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success text-center">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : '' ;?>"
                            value="<?php echo set_value('title', $blog['title']) ;?>">
                        <?php echo form_error('title') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description"
                            class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : '' ;?>"
                            rows="5"><?php echo set_value('description', $blog['description']) ;?></textarea>
                        <?php echo form_error('description') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" name="author" id="author"
                            class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : '' ;?>"
                            value="<?php echo set_value('author', $blog['author']) ;?>">
                        <?php echo form_error('author') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Special</label>
                        <select name="special" class="form-control">
                            <option value="">--Select a Value--</option>
                            <option value="featured" <?php echo ($blog['special'] == 'featured') ? 'selected' : '';?> >Featured</option>
                            <option value="promo" <?php echo ($blog['special'] == 'promo') ? 'selected' : '';?> >Promotional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('blog/index') ;?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</main>

<?php $this->load->view('footer') ;?>