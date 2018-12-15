# Automad Theme Skeleton

You can use this package as a skeleton for new [Automad](https://automad.org) themes. Follow the steps below to get started with developing. 

## 1. Create a New Package 

Navigate to the `packages` directory in your Automad installation and create a directory for your namespace. Inside that directory create a directory for your theme. Use the following command inside the theme directory to create a new theme skeleton:

	composer create-project automad/extension-skeleton .

## 2. Edit composer.json

Edit the included `composer.json` file by changing the package `name` and the `description` fields. Note that you should **not** change the `keywords` and `type` fields in order to be able to publish your theme and share it with others. While you can require other packages, it is very important to always keep the `automad/package-installer` package in the list of required packages.

## 3. Edit theme.json

The `theme.json` file handles all theme information used by Automad. Change the listed fields in order to make sure that your themes shows up correctly in the dashboard.

## 4. Create Some Templates

Add more templates to your theme. Style it with CSS and add some Javascript. The included `template.php` is a very basic example to get started with.

## 5. Publish Your Work

Follow the guide on [Packagist](https://packagist.org) to share your theme with other people.