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
					<h1 class="am-block title">
						@{ title }
					</h1>
					<p class="am-block is-size-5">
						<#
						Storing the language selection in the session data array.
						In case the query string has a 'lang' parameter, a session data variable '%lang'
						is defined. Note that all session data variables begin with a '%'. 
						#>
						<@ if @{ ?lang } @>
							<@ set { %lang: @{ ?lang | 5 } } @>
						<@ end @>
						<#
						In case %lang is set to 'de', 
						the german text will be displayed. 
						#>
						<@ if @{ %lang } != 'de' @>
							This template illustrates the use of session data to build a multilingual website. 
							Click on a language button below to switch between English and German content or 
							use the language stored in the session data array. Click the "Use Session Setting" button 
							to see that the selected language persits even though there is no "lang" parameter within the URL.
						<@ else @>
							Dieses Template verdeutlicht die Nutzung von Sessions, um eine multilinguale Website zu erstellen. 
							Klicke auf einen der Buttons unten, um zwischen Englisch und Deutsch zu wechseln, oder 
							die Spracheinstellung aus dem Session Array zu laden. Klicke auf den "Use Session Setting" Button,
							um zu sehen, dass die ausgewählte Sprache auch angezeigt wird, wenn die URL keinen "lang" Parameter hat.
						<@ end @>
					</p>
					<section class="am-block">
						<#
						This is the markup for the language selection buttons. 
						#>
						<div class="field is-grouped is-grouped-multiline is-marginless">
							<div class="control">
								<div class="field has-addons">
									<p class="control">
										<a
										href="?lang=en" 
										class="button is-dark<@ if @{ %lang | def('en') } = 'en' @> is-active<@ end @>"
										>
										English
										</a>
									</p>
									<p class="control">
										<a
										href="?lang=de" 
										class="button is-dark<@ if @{ %lang } = 'de' @> is-active<@ end @>"
										>
										German
										</a>
									</p>  
								</div>
							</div>
							<div class="control">
								<div class="field">
									<p class="control">
										<a
										href="@{ url }" 
										class="button is-light"
										>
										Use Session Setting
										</a>
									</p>
								</div>
							</div>
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