<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@{ title }</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>
<body>
	<section class="hero is-medium is-light">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
        			@{ title }
      			</h1>
      			<h2 class="subtitle">
        			@{ textTeaser | stripTags }
      			</h2>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="content">
				@{ text | markdown }
			</div>
		</div>
	</section>
</body>
</html>