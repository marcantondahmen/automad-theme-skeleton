<# 
The menu is based on a simple recursive snippet. 
#>
<div class="menu">
	<# 
	First, the recursive snippet is defined to create the navigation tree.
	The snippet definition doesn't produce any output. 
	Calling the snippet below in the homepage (the URL is '/') context will create 
	the actual navigation tree.
	#>
	<@ snippet navigation @>
		<# 
		Only create a list in case there are any subpages. 
		#>
		<@ if @{ :pagelistCount } @>
			<ul class="menu-list">
				<# 
				The 'foreach' statement initiates an iteration over all pages in the pagelist.
				Note that the pagelist will be configured in a later step below
				right before changing to the root context as the entry level of the tree. 
				#>
				<@ foreach in pagelist @>
					<li>
						<a
						<# 
						While iterating the list,  
						the page context changes automatically with every iteration.
						Therefore, the normal page variables can simply be used to 
						reference the content of the current page within the loop.
						#>
						href="@{ url }"	
						<# 
						The ':current' runtime variable makes it easy to verify
						whether the active item in the loop is also the currently requested 
						page.
						#>
						<@ if @{ :current } @>class="has-background-dark has-text-white"<@ end @>
						>
							@{ title }
						</a>
						<# 
						The snippet is recursively called here in case the page path is part
						of the current page's path. That will create a 'collapsed' menu 
						where only the branches to the active page are visible in the tree. 
						Since the pagelist type will be set to 'children' (see below),
						the pagelist automatically contains always all children of the active 
						context (page) in the loop.
						#>
						<@ if @{ :currentPath } @>
							<@ navigation @>
						<@ end @>
					</li>
				<@ end @>
			</ul>
		<@ end @>
	<@ end @>
	<# 
	Before actually calling the snippet, the pagelist is configured here. 
	#>
	<@ newPagelist { 
		type: 'children'
	} @>
	<# 
	To create the tree markup, the navigation snippet is called once initially
	within the context of the homepage ('/').
	#>
	<@ with '/' @>
		<@ navigation @>
	<@ end @>
</div>