
	<div class="container-fluid">
          <div class="row">
    				<div class="row heading-bg bg-blue">
    					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    					  <h5 class="txt-dark">Sub Category</h5>
    					</div>

    					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    					  <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
    							<li><a href="<?php echo base_url(); ?>category/"><span> Category</span></a></li>
    							<li><a href=""><span>Sub Category</span></a></li>
    						<li class="active"><span>View </span></li>
    					  </ol>
    					</div>
    			</div>
    		</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">List  of Sub Categories</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
				<?php if($this->session->flashdata('msg')): ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('msg'); ?>
					</div>
				<?php endif; ?>
            <div class="table-wrap">
              <div class="table-responsive">
                <table id="datable_1" class="table table-hover display  pb-30" >
                  <thead>
                    <tr>
						<th style="width:10%">S.no</th>
						<th style="width:65%">Sub Category Title</th>
						<th style="width:15%">Status</th>
						<th style="width:10%">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php $i=1; foreach($res as $rows){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $rows->category_name; ?></td>
                      <td><?php if($rows->status=='Active'){ ?><span class="text-green">Active</span><?php }else{ ?><span class="text-red">Inactive</span><?php } ?></td>
                      <td><a href="<?php echo base_url(); ?>category/edit_sub_cat/<?php  echo base64_encode($rows->id*9876); ?>"><i class="ti-pencil-alt"></i></a>

                    </td>
                    </tr>
        <?php	 $i++; }  ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
