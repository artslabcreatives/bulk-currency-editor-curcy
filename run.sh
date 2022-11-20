sudo apt update
sudo apt install nginx
sudo apt install mysql-server
sudo apt install php-fpm php-mysql


sudo chown -R $USER ~/.composer && sudo composer install
zip -r temp.zip .
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
mkdir wordpress && cd wordpress && wp core download
cd .. && ls -l
mv temp.zip wordpress/wp-content/plugins
cd wordpress/wp-content/plugins && unzip temp.zip -d temp && cd temp

