<# 
This template uses includes for elements that might be used also in other templates
such as the header, navbar and footer markup. 
#>
<@ elements/header.php @>
	<@ elements/navbar.php @>
	<section class="section">
		<div class="container">
			<div class="columns is-8 is-variable">
				<main class="column is-three-quarters content">
					<# 
					Note that the <h1> has added the 'am-block' class.
					This is essential to make the headline aligned with all other blocks
					in the +main variable.
					#>
					<h1 class="am-block title">
						@{ title }
					</h1>
					@{ +main }
				</main>
				<nav class="column is-one-quater">
					<# 
					Take a look at the menu snippet file to actually see what's happening.
					#>
					<@ elements/menu.php @>
				</nav>
			</div>
		</div>
	</section>
<@ elements/footer.php @>