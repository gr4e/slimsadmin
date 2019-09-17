<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- JQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-ui.min.css">

	<!-- jQuery -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-1.12.4.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- JQuery UI -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
</head>
<body>
	<div class="content-wrapper">

	<div class="box box-default entry">

		<div>
			<div class="box-body">
				<div class="col-md-6">
					<div id="exportContent" class="box box-solid">
						<div class="box-header with-border">
							<i class="fa fa-text-width"></i>

							<h5 class="box-title bold" style="text-align: center;">DEPARTMENT OF SCIENCE AND TECHNOLOGY<br />SCIENCE AND TECHNOLOGY INFORMATION INSTITUTE</h5>
							<h5 class="box-title bold" style="text-align: center;">INFORMATION RESOURCES AND ANALYSIS DIVISION (IRAD)<br />LIBRARY SECTION - CATALOGING AND ACQUISITIONS UNIT </h5>
							<h5 class="box-title bold" style="text-align: center;">ACQUISITIONS LIST<br />(<?php echo $from?> - <?php echo $to?>)</h5>
							
						</div>
						<br>
						<div class="box-body">
							<dl id="materials">
								<?php if(count($books) > 0) : ?>
									<dt><?php echo $letter['a'] ?> Books - <?php echo count($books) ?></dt>
									<ol>
										<?php foreach($books as $book): ?>
											<li>
												<span ><?php $string = $book['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $book['CopyrightDate']; ?></span><span class="italic bold"><?php echo $book['Title']; ?></span><span ><?php echo $book['PublicationPlace']; ?></span><span ><?php echo $book['Publisher']; ?></span><span class="italic"><?php echo $book['Source']; ?></span><span class="italic"><?php echo $book['ClassificationNum']; ?> <?php echo $book['AuthorNum']; ?> <?php echo $book['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($serials) > 0) : ?>
									<dt><?php echo $letter['b'] ?> Serials - <?php echo count($serials) ?></dt>
									<ol>
										<?php foreach($serials as $serial): ?>
											<li >
												<span ><?php $string = $serial['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $serial['CopyrightDate']; ?></span><span class="italic bold"><?php echo $serial['Title']; ?></span><span ><?php echo $serial['PublicationPlace']; ?></span><span ><?php echo $serial['Publisher']; ?></span><span class="italic"><?php echo $serial['Volume']; ?> <?php echo $serial['IssueNumber']; ?> <span class="italic"><?php echo $serial['Source']; ?></span><span class="italic"><?php echo $serial['ClassificationNum']; ?> <?php echo $serial['AuthorNum']; ?> <?php echo $serial['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($theses) > 0) : ?>
									<dt><?php echo $letter['c'] ?> Theses/Dissertations - <?php echo count($theses) ?></dt>
									<ol>
										<?php foreach($theses as $thesis): ?>
											<li >
												<span ><?php $string = $thesis['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $thesis['CopyrightDate']; ?></span><span class="italic bold"><?php echo $thesis['Title']; ?></span><span ><?php echo $thesis['PublicationPlace']; ?></span><span ><?php echo $thesis['Publisher']; ?></span><span class="italic"><?php echo $thesis['Source']; ?></span><span class="italic"><?php echo $thesis['ClassificationNum']; ?> <?php echo $thesis['AuthorNum']; ?> <?php echo $thesis['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($nonprints) > 0) : ?>
									<dt><?php echo $letter['d'] ?> Non-Prints - <?php echo count($nonprints) ?></dt>
									<ol>
										<?php foreach($nonprints as $nonprint): ?>
											<li >
												<span ><?php $string = $nonprint['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $nonprint['CopyrightDate']; ?></span><span class="italic bold"><?php echo $nonprint['Title']; ?></span><span ><?php echo $nonprint['PublicationPlace']; ?></span><span ><?php echo $nonprint['Publisher']; ?></span><span class="italic"><?php echo $nonprint['Source']; ?></span><span class="italic"><?php echo $nonprint['ClassificationNum']; ?> <?php echo $nonprint['AuthorNum']; ?> <?php echo $nonprint['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($verticals) > 0) : ?>
									<dt><?php echo $letter['e'] ?> Vertical Files - <?php echo count($verticals) ?></dt>
									<ol>
										<?php foreach($verticals as $vertical): ?>
											<li >
												<span ><?php $string = $vertical['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $vertical['CopyrightDate']; ?></span><span class="italic bold"><?php echo $vertical['Title']; ?></span><span ><?php echo $vertical['PublicationPlace']; ?></span><span ><?php echo $vertical['Publisher']; ?></span><span class="italic"><?php echo $vertical['Source']; ?></span><span class="italic"><?php echo $vertical['ClassificationNum']; ?> <?php echo $vertical['AuthorNum']; ?> <?php echo $vertical['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($investigatories) > 0) : ?>
									<dt><?php echo $letter['f'] ?> Investigatory Projects - <?php echo count($investigatories) ?></dt>
									<ol>
										<?php foreach($investigatories as $investigatory): ?>
											<li >
												<span ><?php $string = $investigatory['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $investigatory['CopyrightDate']; ?></span><span class="italic bold"><?php echo $investigatory['Title']; ?></span><span ><?php echo $investigatory['PublicationPlace']; ?></span><span ><?php echo $investigatory['Publisher']; ?></span><span class="italic"><?php echo $investigatory['Source']; ?></span><span class="italic"><?php echo $investigatory['ClassificationNum']; ?> <?php echo $investigatory['AuthorNum']; ?> <?php echo $investigatory['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($technicals) > 0) : ?>
									<dt><?php echo $letter['g'] ?> Technical Reports - <?php echo count($technicals) ?></dt>
									<ol>
										<?php foreach($technicals as $technical): ?>
											<li >
												<span ><?php $string = $technical['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $technical['CopyrightDate']; ?></span><span class="italic bold"><?php echo $technical['Title']; ?></span><span ><?php echo $technical['PublicationPlace']; ?></span><span ><?php echo $technical['Publisher']; ?></span><span class="italic"><?php echo $technical['Source']; ?></span><span class="italic"><?php echo $technical['ClassificationNum']; ?> <?php echo $technical['AuthorNum']; ?> <?php echo $technical['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>

								<?php if(count($reprints) > 0) : ?>
									<dt><?php echo $letter['h'] ?> Reprints - <?php echo count($reprints) ?></dt>
									<ol>
										<?php foreach($reprints as $reprint): ?>
											<li >
												<span ><?php $string = $reprint['Author']; $find = 'yyyyyyy'; $replace = ' and '; $result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1); echo str_replace('yyyyyyy',', ',strrev($result)); ?></span><span ><?php echo $reprint['CopyrightDate']; ?></span><span class="italic bold"><?php echo $reprint['Title']; ?></span><span ><?php echo $reprint['PublicationPlace']; ?></span><span ><?php echo $reprint['Publisher']; ?></span><span class="italic"><?php echo $reprint['Source']; ?></span><span class="italic"><?php echo $reprint['ClassificationNum']; ?> <?php echo $reprint['AuthorNum']; ?> <?php echo $reprint['CopyrightDate']; ?></span>
											</li>
										<?php endforeach; ?>
									</ol>
								<?php endif; ?>
							</dl>
						</div>
					</div>
					
				</div>
			</div>
		</div>	
	</div>

	<div class="box-footer">
	</div>
</div>
</body>
</html>


<script type="text/javascript">

</script>

<style type="text/css">
	.italic{
		font-style: italic;
	}

	.bold{
		font-weight: bold;
	}


	@page {
       margin: 75px 75px 75px;
    }

</style>