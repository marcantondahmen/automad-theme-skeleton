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
					<p class="am-block is-size-5">
						This template demonstrates how files can be handled using Automad's template language.
						Check out the source of this file to learn how <b>filelist</b> objects work and 
						how images can be easily resized to be used as thumbnails in cards.
					</p>
					<section class="am-block">
						<div class="columns is-multiline is-variable">
							<#
							The filelist can be defined by one or more glob patterns.
							It is recommended to use a variable with a default pattern 
							as value for the 'glob' parameter. 
							#>
							<@ filelist { 
								glob: @{ images | def('https://source.unsplash.com/8nebi46-k_M/1000x1000, https://source.unsplash.com/GSIzNfR9GLE/1000x1000, https://source.unsplash.com/PxypFiQMkIk/1000x1000') },
								sort: 'asc'
							} @>
							<# 
							The 'foreach' statement initiates an iteration over all files in the filelist.
							Note that it is possible to define resize options within the statement to be applied 
							to the files.
							To access a single image it is also possible to use the 'with' statement.
							#>
							<@ foreach in filelist { width: 400, height: 300, crop: true } @>
								<div class="column is-one-third is-flex">
									<div class="card is-flex-grow-1">
										<div class="card-image">
											<figure class="image is-4by3 is-marginless">
												<img 
												<# 
												The ':fileResized' runtime variable represents the path
												of the resized image in the cache. 
												#>
												src="@{ :fileResized }" 
												<# The basename of the current file in the list. #>
												alt="@{ :basename }"
												<# 
												The ':file' runtime variable contains the path to the
												original unmodified image.
												#>
												title="@{ :file }"
												<# The size of the resized image. #>
												width="@{ :widthResized }"
												height="@{ :heightResized }"
												>
											</figure>
										</div>
										<div class="card-content">
											<div class="content">
												<h4>Image @{ :i }</h4>
												<#
												A caption can be saved along with an image. To get the caption for 
												the current image, the ':caption' variable can used.
												#>
												@{ :caption | def ('This file has **no** caption.') | markdown }
												<p>
													<span class="tag is-dark">
														<# The size of the original image. #>
														@{ :width } x @{ :height }
													</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							<@ end @>
						</div>
					</section>
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