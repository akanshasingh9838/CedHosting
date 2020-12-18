<?php
require_once('header.php');
require_once('Dbcon.php');
require_once('Product.php');
$product = new Product();
$dbcon = new Dbcon();

$id= $_GET['id'];
if(!isset($id)){
    echo "<script>window.location.href = 'index.php'</script>";
}

$res = $product -> fetchCategoryCatpage($id,$dbcon -> conn);
$rows = $product -> fetchprodDescription($id,$dbcon -> conn);
// print_r($rows);
?>
<div class="content">
					<div class="linux-section">
						<div class="container">
							<div class="linux-grids">
								<div class="col-md-8 linux-grid">
								<h2><?php echo $res['prod_name'] ?></h2>
								<ul>
                                    <?php  echo $res['html']; ?>
									<!-- <li><span>Unlimited </span> domains, email and disk space</li>
									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>
									<li><span>1 click</span> WordPress Installation with cPanel (demo) platform</li>
									<li><span>Launch  </span> your business with Rs. 1000* Google AdWords Credit *</li>
									<li><span>30 day </span> Money Back Guarantee</li> -->
								</ul>
									<a href="#myTab">view plans</a>
								</div>
								<div class="col-md-4 linux-grid1">
									<img src="images/cms.png" class="img-responsive" alt=""/>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="tab-prices">
						<div class="container" id="myTab">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<!-- <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
									</ul> -->
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="linux-prices">
										<?php 
										foreach ($rows as $row) :
											$jsonDecDesc = json_decode($row['description']);
											$webSpace = $jsonDecDesc->{'webSpace'};
											$bandwidth = $jsonDecDesc->{'bandwidth'};
											$freeDomain = $jsonDecDesc->{'freeDomain'};
											$LTSupport = $jsonDecDesc->{'LTSupport'};
											$mailbox = $jsonDecDesc->{'mailbox'};
										?>
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4>Standard</h4>
												</div>
												<div class="linux-bottom">
													<h5>$<?php echo $row['mon_price']; ?> <span class="month">per month</span></h5>
													<h5>$<?php echo $row['annual_price']; ?> <span class="month">per annum</span></h5>
													<h6>Single Domain</h6>
													<ul>
													<li><strong>Web Space</strong> <?php echo $webSpace; ?></li>
													<li><strong>Band Width</strong> <?php echo $bandwidth; ?></li>
													<li><strong>Free Domain</strong> <?php echo $freeDomain; ?></li>
													<li><strong>Language/Technology</strong>  <?php echo $LTSupport; ?></li>
													<li><strong>Mail Box</strong>  <?php echo $mailbox; ?></li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#" data-prodid = "<?php echo $row['prod_id']; ?>" id="buynow" data-toggle="modal" data-target="#popmodal">buy now</a>
												<div class="modal fade" id="popmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Choose Your Pack</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<a href="#" type="button" class="btn btn-secondary packbtn" id="annual" onclick = "pack(this.id)";>Annual Pack</a>
														<a href="#" type="button" class="btn btn-secondary packbtn" id="monthly" onclick = "pack(this.id)">Monthly Pack</a>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary" >Save changes</button>
													</div>
													</div>
												</div>
												</div>
											</div>
											<?php endforeach; ?>
											<!-- <div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4>Advanced</h4>
												</div>
												<div class="linux-bottom">
													<h5>$279 <span class="month">per month</span></h5>
													<h6>2 Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4>Business</h4>
												</div>
												<div class="linux-bottom">
													<h5>$279 <span class="month">per month</span></h5>
													<h6>3 Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4>Pro</h4>
												</div>
												<div class="linux-bottom">
													<h5>$259 <span class="month">per month</span></h5>
													<h6>Unlimited Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div> -->
											<div class="clearfix"></div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
									<div class="linux-prices">
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Standard</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$259 <span class="month">per month</span></h5>
													<h6>Single Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#"  class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Advanced</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$359 <span class="month">per month</span></h5>
													<h6>2 Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Business</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$539 <span class="month">per month</span></h5>
													<h6>3 Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Pro</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$639 <span class="month">per month</span></h5>
													<h6>Unlimited Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- clients -->
				<div class="clients">
					<div class="container">
						<h3>Some of our satisfied clients include...</h3>
						<ul>
							<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
							<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
							<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
							<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
						</ul>
					</div>
				</div>
       <!-- clients -->
					<!-- Wordpress Features -->
					<div class="features">
						<div class="container">
							<h3>Wordpress Features</h3>
							<div class="features-grids">
								<div class="col-md-4 features-grid">
									<img src="images/f1.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f2.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f3.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
								<div class="clearfix"></div>
							</div>
							<div class="features-grids">
								<div class="col-md-4 features-grid">
									<img src="images/f4.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f5.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f6.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- Wordpress Features -->
				</div>
			<!---footer--->

<?php 
require_once('footer.php');
?>