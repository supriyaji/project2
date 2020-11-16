<?php  $this->load->view('admin/header');?>
   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Blog</h1>
         </div>
      <form name="blogform" id="blogform" action="<?php echo base_url(). 'blog/add'; ?>" method="post">
         <div class="form-group">
               <label> Title</label>
               <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="form-control">
               <p class="help-block"><?php echo form_error('title');?> </p>
         </div>
         <div class="form-group">
               <label> Description</label>
               <textarea name="description" id="description" class="form-control" rows="5"><?php echo set_value('description'); ?> </textarea>
               <p class="help-block"><?php echo form_error('description');?> </p>
         </div>
         <div class="form-group">
               <label>Author</label>
               <input type="text" name="author" id="author" value="<?php echo set_value('author'); ?>" class="form-control">
               <p class="help-block"><?php echo form_error('author');?> </p>
         </div>
         <div class="form-group">
               <label>Special</label>
               <select name="special" class="form-control" > 
               <option value="">--Select a value--</option>
               <option value="featured"  >Featured</option>
               <option value="promo" >Promotion</option>
               <option value=""></option>
               </select>
                    <p class="help-block"><?php echo form_error('author');?> </p>
         </div>
         <div class="form-group">
               <button class="btn btn-primary">create</button>
         </div>
      </form>
   </main>
<?php  $this->load->view('admin/footer');?>
     
