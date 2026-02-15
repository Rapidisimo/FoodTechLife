# After pulling new code / uploading theme

php composer.phar install --no-dev --optimize-autoloader
php composer.phar dump-autoload --optimize --classmap-authoritative

# Acorn caches

wp acorn view:clear
wp acorn view:cache
wp acorn config:cache
wp acorn optimize

# WP Super Cache

# (in admin) Delete Cache, then warm a few key pages logged out
