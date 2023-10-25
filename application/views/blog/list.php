<?php $this->load->view('header') ;?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3">
                <h1 class="h2">List Blogs</h1>
                <hr>

                <?php if ($this->session->flashdata('msg')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php endif; ?>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Special</th>
                            <th class="text-center" style="width: 150px;">Action</th>
                        </tr>

                        <?php if (!empty($blogs)): ?>
                        <?php foreach ($blogs as $blog): ?>
                        <tr>
                            <td><?php echo $blog['blog_id']; ?></td>
                            <td><?php echo $blog['title']; ?></td>
                            <td class="text-justify"><?php echo $blog['description']; ?></td>
                            <td><?php echo $blog['author']; ?></td>
                            <td>
                                <?php if ($blog['special'] == 'featured'){
                                    echo 'Featured';
                                }else if ($blog['special'] == 'promo'){
                                    echo 'Promotional';
                                }else{
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url('blog/edit/'.$blog['blog_id']);?>"
                                    class="btn btn-primary ">Edit</a>
                                <a href="#" onclick="deleteBlog(<?php  echo $blog['blog_id'] ;?>);" class="btn btn-danger ">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5">No records found.</td>
                        </tr>
                        <?php endif; ?>
                    </table>


                </div>
            </div>
        </div>
    </div>

</main>


<?php $this->load->view('footer') ;?>

<script type="text/javascript" >
    function deleteBlog(id) {
        if(confirm("Are you sure want to delete?")){
            window.location.href="<?php echo base_url('blog/delete/');?>"+id;
        }
    }
</script>