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
						Building a portfolio or blog page is a very common task. Check out the source of this 
						template to understand how <b>pagelist</b> objects work and how filters can be easily implemented 
						using Automad's template language.
					</p>
					<# 
					As a next step, the pagelist is configured.
					Note that query string parameters get used as parameter values to make the pagelist
					controllable by a menu.
					#>
					<@ newPagelist {  
						filter: @{ ?filter }, 
						match: '{":level": "/(1|2)/"}',
						search: @{ ?search },
						sort: @{ ?sort | def ('date desc') }
					} @>
					<# 
					A simple filter menu lets the user filter the paglist dynamically.
					#>
					<div class="am-block mb-5 field is-grouped is-grouped-multiline">
						<div class="control">
							<div class="field has-addons">
								<div class="dropdown is-hoverable">
									<div class="dropdown-trigger">
										<button class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu">
											<span>
												<span class="icon is-small">
													<i class="fas fa-filter" aria-hidden="true"></i>
												</span>&nbsp;
												Filters
											</span>
											<span class="icon is-small">
												<i class="fas fa-angle-down" aria-hidden="true"></i>
											</span>
										</button>
									</div>
									<div class="dropdown-menu" id="dropdown-menu" role="menu">
										<div class="dropdown-content">
											<#
											The first button in the menu resets the filter.
											Note that the 'queryStringMerge' method is used here for the href attribute value to only 
											modify the filter parameter within an existing query string without resetting other options. 
											#>
											<a 
											href="?<@ queryStringMerge { filter: false } @>"
											class="dropdown-item<@ if not @{ ?filter } @> is-active<@ end @>"
											>
												All
											</a>
											<# 
											The 'filters' object contains all available tags of pages in the pagelist.
											The 'foreach' statement can be used to iterate over that list to create a filter button
											for every tag.
											#>
											<@ foreach in filters @>
												<a 
												<# Note the 'queryStringMerge' method. #>
												href="?<@ queryStringMerge { filter: @{ :filter } } @>" 
												<# The 'if' condition can be used to test whether a button is active. #>
												class="dropdown-item<@ if @{ ?filter } = @{ :filter } @> is-active<@ end @>"
												>
													<# The ':filter' runtime variable contains the current tag within the loop. #>
													@{ :filter }
												</a>
											<@ end @>
										</div>
									</div>
								</div>
							</div>
						</div>
						<# The sorting menu. #>
						<div class="control">
							<div class="field has-addons">
								<p class="control">
									<a 
									<# The concept of creating the sorting menu is the same as for the filters. #>
									href="?<@ queryStringMerge { sort: 'date desc' } @>" 
									class="button is-dark<@ if not @{ ?sort } or @{ ?sort } = 'date desc' @> is-active<@ end @>">
										<span class="icon is-small">
											<i class="fas fa-sort-numeric-down" aria-hidden="true"></i>
										</span>&nbsp;
										Date
									</a>
								</p>
								<p class="control">
									<a 
									href="?<@ queryStringMerge { sort: 'title asc' } @>" 
									class="button is-dark<@ if @{ ?sort } = 'title asc' @> is-active<@ end @>"
									>
										<span class="icon is-small">
											<i class="fas fa-sort-alpha-up" aria-hidden="true"></i>
										</span>&nbsp;
										Title
									</a>
								</p>
							</div>
						</div>
						<# A normal form is used to create the keyword search field. #>
						<div class="control">
							<form action="" method="get">
								<input 
								class="input" 
								type="text" 
								<# 
								Note that the input name can be used as variable. 
								For example 'name="search"' will add a query string parameter 'search' on submission
								which can be used as '@{ ?search }' (see value attribute).
								#>
								name="search" 
								placeholder="Keyword" 
								value="@{ ?search }"
								/>
							</form>
						</div>
					</div>
					<# 
					The pagelist markup. 
					#>
					<div class="columns is-multiline is-variable">
						<@ foreach in pagelist @>
							<# 
							While iterating over the pages,  
							the page context changes automatically with every iteration.
							Therefore, the normal page variables can simply be used to 
							reference the content of the current page within the loop.
							#>
							<div class="column is-one-third is-flex">
								<div class="card is-flex-grow-1">
									<div class="card-content">
										<div class="content">
											<h3>@{ title }</h3>
											<span class="is-size-7">
												<# 
												Pipe functions can be used to modify the content of a variable.
												Here the date string is formatted to 'F Y' (month and year).
												#>
												@{ date | dateFormat ('F Y') }
											</span>
											<p class="mt-3 mb-5">
												<# 
												Multiple pipe functions can be chained. 
												Here, the first paragraph block of the "+main" avriable is used
												as teaser text. If there is no paragraph, the "textTeaser" variable is used as falback.
												Then all tags get stripped before shortening the content to 100 characters.
												#>
												@{ +main | findFirstParagraph | 150 }
											</p>
											<a href="@{ url }" class="button">More ...</a>
										</div>
									</div>
								</div>
							</div>
						<@ end @>
					</div>
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