# Setting Up and Managing the Repository for Local Development


## Initial Setup

*Prerequisites:* Must have composer installed (https://getcomposer.org/download/)


1. Clone repository to your local computer
2. Run composer update, which will install all of the plugins
3. Download the latest version of Wordpress (https://wordpress.org/download/) and unzip it
4. Copy all of the files from the root directory and the wp-admin and wp-includes directories into your repository
5. Setup your local wp-config.php and database
6. Manully activate all plugins


## Managing Updates

- Whenever you do a git pull, note if composer.json was updated. If it was, run composer update to install new plugins
- If you install new plugin from the WordPress repository, you will also need to update the composer.json with the package name from https://wpackagist.org/ (always set it to use the latest or newer version).
- If you install a plugin that is not part of the WordPress repository (paid third party plugins for the most part) you need to edit the .gitignore file so that the file is added to git
- You are responsible for keeping your local WordPress and plugins that aren't in Git updated

## Deployment to live site

- On the initial deployment, all plugins not in Git will need to be transferred to the live server either via SSH/FTP or by manual installation and activated
- If plugins are added post initial deployment, they will also need to be manually transferred to the live server

