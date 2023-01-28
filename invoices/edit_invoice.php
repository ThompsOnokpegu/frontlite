
<?php 
include "includes/print.php";
include "includes/update.php";
include "../templates/header.php"; 
$des = json_decode($invoice['descriptions'], true);
$price = json_decode($invoice['prices'],true);
$owner = json_decode($invoice['owners'],true);
$qty = json_decode($invoice['quantities'],true);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
		<?php if (isset($_POST['save_invoice']) && $update_statement) { ?> 
          <div class="card-header alert alert-success alert-dismissible fade show" role="alert">
              <div class="row">
                <div class="col-md-6">
				<h5>Updated <strong></strong> Invoice successfully</h5>
                </div>
                <div class="col-md-6">
                </div>
              </div>
		  </div>
		<?php } else{ ?>
			<div class="card-header">
              <div class="row">
                <div class="col-md-6">
				<h5>Update <strong><?php echo $invoice['firstname']." (".$invoice['customer_id'].")";?></strong> Invoice</h5>
                </div>
                <div class="col-md-6">
                </div>
              </div>
		  </div>
		<?php }?>
          <!-- /.card-header -->
          <div class="card-body">
		  <div class="row clearfix">
		<div class="col-md-12 column">
			<form method="post" name="cart">
			<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">	 
			<table name="cart" class="table table-bordered table-hover table-sm" id="tab_logic">
				<thead>
					<tr>
						<td colspan="6" style="background:#dee2e6;">
							<div class="form-row">
								<div class="form-group col-md-2 col-sm-12">
									<label>Deposit (₦)</label>
									<input type="number" value="<?php echo escape($invoice['deposit']); ?>" name="deposit" class="form-control" placeholder="350000" required>
								</div>
								<div class="form-group col-md-2 col-sm-12">
									<label>Discount (₦)</label>
									<input type="number" value="<?php echo escape($invoice['discount']); ?>" name="discount" class="form-control" placeholder="53000" required>
								</div>
								<div class="form-group col-md-2 col-sm-12">
									<label>Shipping (₦)</label>
									<input type="number" name="shipping" value="<?php echo escape($invoice['shipping']); ?>"  class="form-control" placeholder="24000" required>
								</div>
								<div class="form-group col-md-3 col-sm-12">
									<label>Mode of Payment</label>
									<select class="custom-select" name="mode_of_payment" required>
										<option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Cash") echo "selected='selected'";?> value="Cash">Cash</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Access Transfer - Director") echo "selected='selected'"; ?>value="Access Transfer - Director">Access Transfer - Director</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="FCMB Transfer -Director") echo "selected='selected'"; ?>value="FCMB Transfer -Director">FCMB Transfer - Director</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="GTB Transfer") echo "selected='selected'"; ?>value="GTB Transfer">GTB Transfer</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Zenith Transfer") echo "selected='selected'"; ?>value="Zenith Transfer">Zenith Transfer</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Access POS") echo "selected='selected'"; ?>value="Access POS">Access POS</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="GTB POS") echo "selected='selected'"; ?>value="GTB POS">GTB POS</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Zenith POS") echo "selected='selected'"; ?>value="Zenith POS">Zenith POS</option>
										<option <?php if(escape($invoice['mode_of_payment'])=="Cheque") echo "selected='selected'"; ?>value="Cheque">Cheque</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-sm-12">
									<div class="form-check">
										<input hidden type="text" name="bal" id="bal" value="<?php echo escape($invoice['bbf']);?>">
										<input class="form-check-input" type="checkbox" value="" id="old_balance" name="old_balance" checked disabled>
										<label class="form-check-label" for="defaultCheck1">Balance brought forward: <strong style="color:red">₦<?php echo number_format($invoice['bbf'],2);?></strong>
										<!-- <input style="color:red;" name="old_bal" id="old_bal" type="hidden" value="">	 -->
										</label>	
									</div>
								</div>
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
							Quantity
						</th>
						<th width="15%"class="text-center">
							Unit Price(₦)
						</th>
						<th width="15%"class="text-center">
							Total(₦)
						</th>
					</tr>
				</thead>
				<tbody id="row_count">
					<tr name="line_items">
						<td>
						1
						</td>
						<td>
						<input type="text" name='des1'  value="<?php echo escape($des['des1']) ?>" placeholder='Description' class="form-control" required/>
						</td>
						<td>
						  <select class="custom-select" name="owner1" required>
							<option <?php if(escape($owner['owner1'])=="NA") echo "selected='selected'";?>value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner1'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner1'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty1' value="<?php echo escape($qty['qty1']) ?>" placeholder='1' class="form-control" required/>
						</td>
						<td>
						<input type="number" name='price1' value="<?php echo escape($price['price1']) ?>" placeholder='0.00' class="form-control" required/>
						</td>
						<td>
						<input type="text" name='item_total1' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty1} * {price1}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						2
						</td>
						<td>
						<input type="text" name='des2' value="<?php echo escape($des['des2']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner2">
							<option <?php if(escape($owner['owner2'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner2'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner2'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty2' value="<?php echo escape($qty['qty2']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price2' value="<?php echo escape($price['price2']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total2' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty2} * {price2}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						3
						</td>
						<td>
						<input type="text" name='des3' value="<?php echo escape($des['des3']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner3" >
						  <option <?php if(escape($owner['owner3'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner3'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner3'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty3' value="<?php echo escape($qty['qty3']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price3' value="<?php echo escape($price['price3']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total3' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty3} * {price3}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						4
						</td>
						<td>
						<input type="text" name='des4' value="<?php echo escape($des['des4']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner4">
						  <option <?php if(escape($owner['owner4'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner4'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner4'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty4' value="<?php echo escape($qty['qty4']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price4' value="<?php echo escape($price['price4']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total4' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty4} * {price4}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						5
						</td>
						<td>
						<input type="text" name='des5' value="<?php echo escape($des['des5']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner5">
						  <option <?php if(escape($owner['owner5'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner5'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner5'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty5' value="<?php echo escape($qty['qty5']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price5' value="<?php echo escape($price['price5']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total5' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty5} * {price5}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						6
						</td>
						<td>
						<input type="text" name='des6' value="<?php echo escape($des['des6']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner6">
						  <option <?php if(escape($owner['owner6'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner6'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner6'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty6' value="<?php echo escape($qty['qty6']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price6' value="<?php echo escape($price['price6']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total6' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty6} * {price6}"/>
						</td>
					</tr>
					<tr name="line_items">
						<td>
						7
						</td>
						<td>
						<input type="text" name='des7' value="<?php echo escape($des['des7']) ?>"  placeholder='Description' class="form-control"/>
						</td>
						<td>
						  <select class="custom-select" name="owner7">
						  <option <?php if(escape($owner['owner7'])=="NA") echo "selected='selected'";?> selected='selected' value="NA">N/A</option>
						  	<option <?php if(escape($owner['owner7'])=="Client") echo "selected='selected'";?>value="Client">Client</option>
							<option <?php if(escape($owner['owner7'])=="Company") echo "selected='selected'";?>value="Company">Company</option>
                          </select>
						</td>
						<td>
						<input type="number" name='qty7' value="<?php echo escape($qty['qty7']) ?>" placeholder='1' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price7' value="<?php echo escape($price['price7']) ?>" placeholder='0.00' class="form-control"/>
						</td>
						<td>
						<input type="text" name='item_total7' placeholder="0.00" class="form-control" value="" jAutoCalc="{qty7} * {price7}"/>
						</td>
					</tr>

                    <tr>
						<td colspan="4">&nbsp;</td>
						<td>Subtotal</td>
						<td><input type="text"  class="form-control" name="sub_total" value="" jAutoCalc="{item_total1}+{item_total2}+{item_total3}+{item_total4}+{item_total5}+{item_total6}+{item_total7}"></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
						<td>
							<select name="tax" class="form-control">
								<option <?php if(escape($invoice['vat'])==".075") echo "selected='selected'"?> value=".075">VAT(7.5%)</option>
								<option <?php if(escape($invoice['vat'])=="0.00") echo "selected='selected'"?> value="0.00">VAT-Free</option>
							</select>
						</td>
						<td><input type="text" class="form-control" name="tax_total" value="" jAutoCalc="({sub_total} * {tax})"></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
						<td>Grand Total</td>
						<td><input type="text" class="form-control" name="grand_total" value="" jAutoCalc="{sub_total} + {tax_total}+{shipping}+{bal}"></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>Balance</td>
						<td><input type="text" class="form-control" name="balance" value="" jAutoCalc="{grand_total}-{discount}-{deposit}"></td>
					</tr>
				</tbody>
				
			</table>
			
			<br><br>
				<input type="hidden" id="countRow" name="count" value="">
				<input class="btn btn-success" type="submit" value="Save Invoice" name="save_invoice">
				
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