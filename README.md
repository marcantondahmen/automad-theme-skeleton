# Automad Theme Skeleton

You can use this package as a skeleton for new [Automad](https://automad.org) themes. Follow the steps below to get started with developing. 

## 1. Edit composer.json

Edit the included `composer.json` file by changing the package `name` and the `description` fields. Note that you should **not** change the `keywords` and `type` fields in order to be able to publish your theme and share it with others. While you can require other packages, it is very important to always keep the `automad/package-installer` package in the list of required packages.

## 2. Edit theme.json

The `theme.json` file handles all theme information used by Automad. Change the listed fields in order to make sure that your themes shows up correctly in the dashboard.

## 3. Create Some Templates

Add more templates to your theme. Style it with CSS and add some Javascript. The included `template.php` is a very basic example to get started with.

## 4. Publish Your Work

Follow the guide on [Packagist](https://packagist.org) to share your theme with other people.