sudo apt update
sudo apt install nginx
sudo apt install mysql-server
sudo apt install php-fpm php-mysql


run: sudo chown -R $USER ~/.composer && sudo composer install
run: zip -r temp.zip .
run: curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
run: chmod +x wp-cli.phar
run: sudo mv wp-cli.phar /usr/local/bin/wp
run: mkdir wordpress && cd wordpress && wp core download
run: cd .. && ls -l
run: mv temp.zip wordpress/wp-content/plugins
run: cd wordpress/wp-content/plugins && unzip temp.zip -d temp && cd temp

