          <div class="container-fluid">
		  
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Dashboard</h5>
					</div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>admin/home/">Dashboard</a></li>
						</ol>
					</div>
				</div>

				

				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Total Customers</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="sm-graph-box">
										<div class="row">
											<div class="col-xs-6">
												<i class="fa fa-user" style="font-size:50px;padding-left:50px;color:#EF6A6B;"></i>
											</div>
											<div class="col-xs-6">
												<div class="counter-wrap text-right">
													<span class="counter"><?php foreach($res_count_cust as $rows_cus_count){}  echo $rows_cus_count->count_cust; ?></span>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Total Products</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6">
													<i class="fa fa-shopping-basket" style="font-size:40px;padding-left:50px;color:#FDBC5E;"></i>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														<span class="counter"><?php foreach($res_count_product as $rows_pro_count){}  echo $rows_pro_count->count_product; ?></span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Total Categories</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6"> 
													<i class="fa fa-outdent" style="font-size:40px;padding-left:50px;color:#699BD2;"></i>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														</span><span class="counter"><?php foreach($res_count_category as $rows_cat_count){}  echo $rows_cat_count->count_category; ?></span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
					</div>
					<div class="col-lg-6 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Monthly Sales Report</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<div id="curve_chart" style="height: 417px"></div>
								</div>
                            </div>
                        </div>
					</div>
					
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary card-view">
							<div class="panel-heading mb-20">
								<div class="pull-left">
									<h6 class="panel-title txt-light">Top Selling Product</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap" style="min-height:403px;">
										<div class="table-responsive">
											<table  class="table  top-countries" >
												<tbody>
												<?php foreach($res_top_selling as $res_selling){ ?>
													<tr>
														<td><?php echo $res_selling->product_name; ?></td>
														<td><?php echo $res_selling->TotalQuantity; ?></td>
													</tr>
												<?php } ?>
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
				

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Recent Orders</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_2" class="table table-hover display  pb-30" >
												<thead>
													<tr>
													  <th>Date</th>
                                                      <th>Order ID</th>
                                                      <th>Payment</th>
                                                      <th>Customer Name</th>
                                                      <th>price</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($res_recent_orders as $res_prod){ ?>
                                                  <tr>
                                                      <td><?php echo $newDate = date("d-m-Y H:i:s", strtotime($res_prod->purchase_date));  ?></td>
                                                      <td><?php echo $res_prod->order_id; ?></td>
                                                      <td><?php if($res_prod->status =='Success'){ ?>
															<button class="label label-success font-weight-100">Order Placed</button>
													  <?php } ?>
                                                        
                                                      </td>
                                                      <td>
                                                        <?php echo $res_prod->name; ?>
                                                      </td>
                                                      <td><?php echo $res_prod->total_amount; ?></td>
                                                  </tr>

                                            <?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>

				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Stocks Left</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_3" class="table table-hover display pb-30" >
												<thead>
													<tr>
														<th>#</th>
														<th style="width:400px;">Products</th>
														<th>Offer / Combined</th>
														<th>Total</th>
														<th>Stocks Left</th>
													</tr>
												</thead>
												
												<tbody>
													<?php $i=1; foreach($res_prod_stocks as $rows_prod_stocks){  ?>
														<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $rows_prod_stocks->product_name; ?></td>
									<td><?php if($rows_prod_stocks->offer_status=='1'){ ?>
									<span class="badge  badge-danger">offer</span>
								  <?php  }
								  if($rows_prod_stocks->combined_status=='1'){ ?>
								  <span class="badge badge-info">Combined</span>
								<?php  } ?></td>
														<td><?php echo $rows_prod_stocks->total_stocks; ?></td>
														<td><span class="text-danger text-semibold"> <?php echo $rows_prod_stocks->stocks_left; ?></span> </td>
													</tr>
                      <?php  $i++;  } ?>
													
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
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

	$('#datable_2').DataTable(
	{
		pageLength : 5,
		lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
	} );
			
	$('#datable_3').DataTable();
	
	google.charts.load('current', {packages: ['corechart','line']});
	function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Months');
            data.addColumn('number', 'Sales');
            data.addRows([
			<?php 	
			foreach($res_sales_graph as $rows){ 
				echo "['$rows->month_year', $rows->total_sales],";
			}
			?>    
            ]);
            // Set chart options
            var options = {

               pointsVisible: true
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);

    </script>