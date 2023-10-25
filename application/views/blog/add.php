<?php $this->load->view('header') ;?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3">
                <h1 class="h2">Add Blog</h1>
                <hr>
                <form name="blogForm" id="blogForm" method="post" action="<?php echo base_url('blog/add') ;?>">
                    <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success text-center">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : '' ;?>"
                            value="<?php echo set_value('title') ;?>" placeholder="Title">
                        <?php echo form_error('title') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description"
                            class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : '' ;?>"
                            rows="5" placeholder="Description"><?php echo set_value('description') ;?></textarea>
                        <?php echo form_error('description') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" name="author" id="author"
                            class="form-control <?php echo (form_error('author') != "") ? 'is-invalid' : '' ;?>"
                            value="<?php echo set_value('author') ;?>" placeholder="Author">
                        <?php echo form_error('author') ;?>
                    </div>
                    <div class="form-group">
                        <label for="">Special</label>
                        <select name="special" class="form-control">
                            <option value="">--Select a Value--</option>
                            <option value="featured">Featured</option>
                            <option value="promo">Promotional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</main>

<?php $this->load->view('footer') ;?>