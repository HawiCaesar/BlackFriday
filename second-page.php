<html>
<?php session_start() ?>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<!-- THIS META TAG ENABLES RESPONSIVITY, MUST BE INCLUDED!! -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Black Friday Deals @ Kilimall</title>
</head>

<style>

	body{background-color: #f5f5f5;}
	
	.row-heading{
		display: block;
		width: 100%;
		height: auto;
		margin-bottom: 30px;
	}
	.row-heading.sbu{
		background-color: #BF1E2E;
	}
	.row-heading.fbu{
		background-color: #D2108D;
	}
	.row-heading.hbu{
		background-color: #0D75BC;
	}
	.row-heading.combo{
		background-color: #FFC50C;
	}
	.mt10{
		margin-top: 10px;
	}
	.mb10{
		margin-bottom: 10px;
	}
	.column{padding: 0 10px;}

	[data-columns] > div{
		float: left;
	}
	.cols4[data-columns]::before {
		content: '4 .column.size-1of4';
	}
	.size-1of4 {
		width: 25%;
	}
	.product{
		text-align: center;
		background-color: #fff;
		margin-top:10px;
		border-radius: 6px;
		overflow: hidden;
		padding-bottom: 10px;
	}
	.product:hover{
		box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
	}
	.details{
		padding: 5px 15px;
	}
	.product a{
		color: #333;
	}
	.product a:hover{
		color: #F44336;
	}
	.product img{
		margin: 0 auto;
		max-height: 400px;
		width:100%;
	}
	.details h5{
		color: #C00;
		font-weight: 800;
	}


	/* Products without details*/
	.section--hbu .details, .details{
		display: none;
	}

	/* Product without padding for image*/
	.section--fbu .product{
		padding-bottom: 0;
	}

	@media(max-width: 767px){
		.row-heading{
			margin-bottom: 5px;
		}

		.column{
			width: 100%;
			padding: 0;
		}
		.product{
			width: 48%;
			float:left;
		}
		.product:nth-child(2n){
			margin-left: 1%;
		}
		.product:nth-child(2n+1){
			margin-right: 1%;
		}
	}

</style>

<body>

	<div class="container-fluid">
		<!--@start sbu -->
		<div class="row mb10">
			<div class="col-lg-12">
				<img src="img/banner-timelimited.jpg" >
				<div class="products cols4" data-columns>
					<!--@start product-->
					<?php $brand_selected_group = $_SESSION['selected_brand'];
								foreach($brand_selected_group as $brand_selected): ?>
					<div class="product of4">
						<a href="<?php echo $brand_selected['url']; ?>"><img src="<?php echo $brand_selected['image']; ?>" class="img-responsive"></a>
						<div class="details text-center">
							<a href="#"><h4><?php //echo $brand_selected['product'];?></h4></a>
							<h5><?php //echo 'Kshs '.number_format($brand_selected['blackfriday_price'],0,'',','); ?></h5>
						</div>
					</div>
					<?php endforeach; ?>
					<!--@end product-->
				</div>
			</div>
		</div>
		<!--@end sbu-->

		<!--@start fbu -->
		<div class="row mt10 mb10">
			<div class="col-lg-12 section--fbu" style="background:#fff;">
				<div class="row-heading">
					<!-- <img src="img/header-fbu.png"> -->
					<img src="img/<?php echo $pic = $_SESSION['category_picture']; ?>">
				</div>
				<div class="products cols4" data-columns>
					<!--@start product-->
					<?php $brand_other_group = $_SESSION['other_brands'];
								foreach($brand_other_group as $brand_other): ?>
					<div class="product of5">

						<a href="<?php echo $brand_other['url']; ?>"><img src="<?php echo $brand_other['image']; ?>" class="img-responsive"></a>
						<div class="details text-center">
							<a href="#"><h4><?php //echo $brand_other['product'];?></h4></a>
							<h5><?php //echo 'Kshs '.number_format($brand_other['blackfriday_price'],0,'',','); ?></h5>
						</div>
					</div>
					<?php endforeach; ?>
					<!--@end product-->
				</div>
			</div>
		</div>
		<!--@end fbu-->

	</div><!--eind of container-->

	<script src="files/salvattore.min.js"></script>
</body>
</html>