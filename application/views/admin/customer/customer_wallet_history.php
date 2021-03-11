	<div class="container-fluid">
          <div class="row">
    				<div class="row heading-bg bg-green">
    					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    					  <h5 class="txt-light">Customers</h5>
    					</div>

    					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    					  <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
    							<li><a href="<?php echo base_url(); ?>admin/customers"><span> Customer </span></a></li>
    							<li class="active"><span>Wallet </span></li>
    					  </ol>
    					</div>
    			</div>
    		</div>
				<!-- Row -->
				<div class="row" id="">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"> List of Transactions</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display pb-30" >
												<thead>
													<tr>
														<th>S.no</th>
														<th>Order ID</th>
														<th>Date</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Notes</th>
													</tr>
												</thead>
												<tbody>
													<?php  $i=1; foreach($res_wallet as $wallet){ ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $wallet->order_id; ?></td>
														<td><?php echo date('d-m-Y',strtotime($wallet->created_at)); ?> </td>
														<td><?php echo $wallet->transaction_amt; ?></td>
														<td><?php echo $wallet->status; ?></td>
														<td><?php echo $wallet->notes; ?></td>
													</tr>
												<?php $i = $i+1; } ?>



												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
  </div>
