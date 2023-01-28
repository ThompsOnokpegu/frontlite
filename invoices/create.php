<?php 
include "../customers/scripts/read.php";
include "includes/read.php";
include "includes/process.php";
include "../templates/header.php"; 


if(isset($_GET['order_ids'])){
	$jobcount = 2;
	$jobpages = $_GET['order_ids'];
}
if(isset($_GET['order_id'])){
	$jobcount = 1;
	$jobpages = $_GET['order_id'];
}
$_SESSION['jobcount'] = $jobcount;
$_SESSION['jobpages'] = $jobpages;
?>
<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
              <div class="row">
                <div class="col-sm-12">
				<span>Generating Invoice for <small class="badge badge-info"> <?php echo $customer['lastname']." ".$customer['firstname'].": ".$jobpages;?></small></span>
				
                </div>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		  <div class="row clearfix">
			<div class="col-sm-12 column">
			<form method="post" name="cart">
			<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
			<input type="text" name="jobpages" value="<?php echo $jobpages;?>" class="form-control" hidden>	 
			<table name="cart" class="table table-bordered table-hover table-sm" id="tab_logic">
				<thead>
					<tr width="80%">
						<td colspan="6">
							<div class="form-row">
								<div class="form-group col-md-2 col-sm-12">
									<label>Deposit (₦)</label>
									<input type="number" name="deposit" value=0 class="form-control" placeholder="350000" required>
								</div>
								<div class="form-group col-md-2 col-sm-12">
									<label>Discount (₦)</label>
									<input type="number" name="discount" value=0 class="form-control" placeholder="53000" required>
								</div>
								<div class="form-group col-md-2 col-sm-12">
									<label>Shipping (₦)</label>
									<input type="number" name="shipping" value=0 jAutoCalc="{0}*{1}" class="form-control" placeholder="24000" required>
								</div>
								<div class="form-group col-md-2 col-sm-12">
									<label>Payment</label>
									<select class="custom-select" name="mode_of_payment" required>
										<option selected>
										<option value="Dollar">Cash (Dollar)</option>
										<option value="Cash">Cash (Naira)</option>
										<option value="Access Transfer - Director">Access Transfer - Director</option>
										<option value="FCMB Transfer -Director">FCMB Transfer - Director</option>
										<option value="GTB Transfer">GTB Transfer</option>
										<option value="Zenith Transfer">Zenith Transfer</option>
										<option value="Access POS">Access POS</option>
										<option value="GTB POS">GTB POS</option>
										<option value="Zenith POS">Zenith POS</option>
										<option value="Cheque">Cheque</option>
									</select>
								</div>	
								<input hidden type="text" name="bal" id="bal" value="<?php if($count>0){echo $results['balance'];}else{echo 0;}?>">							
								<?php if($count>0){?>
									<div class=" col-md-4 col-sm-12 callout callout-danger" style="padding-left:0.5rem;">
									<span>Includes outstanding balance: 
										<strong style="color:red">₦<?php echo number_format($results['balance'],2);?> 
										</strong>
										<br>from <a href='#'><?php echo $results['invoice_id'];?></a>
									</span>
									</div>
								<?php }?>
									
							</div>
						</td>
					</tr>
					<tr >
						<th width="5%" class="text-center">
							#
						</th>
						<th width="45%" class="text-center">
							Description
						</th>
						<th width="10%" class="text-center">
							Owner
						</th>
						<th width="10%"class="text-center">
							Qty
						</th>
						<th width="15%"class="text-center">
							Price(₦)
						</th>
						<th width="15%"class="text-center">
							Total(₦)
						</th>
					</tr>
				</thead>
				<style>
						#sn{
							text-align: center;
						}
						#invoice{
							text-align: right;
						}
						
					</style>
				<tbody id="row_count">
					
					<tr name="line_items">
						<td id="sn">1</td>
						<td>
						<input type="text" name='des1'  placeholder='Description' class="form-control" required/>
						</td>
						<td>
						  <select class="custom-select" name="owner1" required>
							<option value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option selected value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty1' placeholder='0' class="form-control" required/>
						</td>
						<td>
						<input type="number" name='price1' placeholder='0.00' class="form-control" required/>
						</td>
						<td>
						<input type="text" name='item_total1' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty1} * {price1}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						2
						</td>
						<td>
						<input type="text" name='des2'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner2">
							<option value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option selected value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty2' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price2' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total2' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty2} * {price2}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						3
						</td>
						<td>
						<input type="text" name='des3'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner3" >
							<option value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option selected value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty3' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price3' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total3' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty3} * {price3}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						4
						</td>
						<td>
						<input type="text" name='des4'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner4">
							<option selected value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty4' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price4' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total4' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty4} * {price4}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						5
						</td>
						<td>
						<input type="text" name='des5'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner5">
							<option selected value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty5' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price5' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total5' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty5} * {price5}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						6
						</td>
						<td>
						<input type="text" name='des6'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner6">
							<option selected value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty6' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price6' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total6' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty6} * {price6}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td id="sn">
						7
						</td>
						<td>
						<input type="text" name='des7'  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner7">
							<option selected value="NA">N/A</option>
						  	<option value="Client">Client</option>
							<option value="Store">Store</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty7' placeholder='0' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price7' placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total7' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty7} * {price7}"/>
						</td>
					</tr>

                    <tr>
						<td colspan="4">
							&nbsp;
						</td>
						<td id="invoice">Subtotal</td>
						<td><input type="text"  class="form-control" name="sub_total" value="" jAutoCalc="{item_total1}+{item_total2}+{item_total3}+{item_total4}+{item_total5}+{item_total6}+{item_total7}"></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
						<td>
							<select id="invoice" name="tax" class="custom-select">
								<option value=".075">VAT(7.5%)</option>
								<option selected value="0.00">VAT-Free</option>
							</select>
						</td>
						<td><input type="text" class="form-control" name="tax_total" value="" jAutoCalc="({sub_total} * {tax})"></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
						<td id="invoice">Grand Total</td>
						<td><input type="text" class="form-control" name="grand_total" value="" jAutoCalc="{sub_total} + {tax_total}+{shipping} + {bal}"></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td id="invoice">Balance</td>
						<td><input type="text" class="form-control" name="balance" value="" jAutoCalc="{grand_total}-{discount}-{deposit}"></td>
					</tr>
				</tbody>
				
			</table>
			
			<br><br>
				<input type="hidden" id="countRow" name="count" value="">
				<input class="btn btn-success" type="submit" value="Submit Invoice" name="submit_invoice">
				
			</div>
			</form>
		</div>
	</div>
	
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "../templates/footer.php"; ?>