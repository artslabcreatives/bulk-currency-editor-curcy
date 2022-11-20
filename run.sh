sudo apt update
sudo apt install nginx
sudo apt install mysql-server
sudo apt install php-fpm php-mysql

sudo bash mysql-create-db-user.sh --host=localhost --database=testdb --user=homestead --pass=secret

mkdir /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress
cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/
sudo cp config.conf /etc/nginx/sites-available/config.conf
sudo ln -s /etc/nginx/sites-available/config.conf /etc/nginx/sites-enabled/config
sudo service nginx restart

zip -r temp.zip .

curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress
wp core download

cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/
mv temp.zip /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress/wp-content/plugins
cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress/wp-content/plugins
unzip temp.zip -d temp
cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress/wp-content/plugins/temp

cd /home/runner/work/bulk-currency-editor-curcy/bulk-currency-editor-curcy/wordpress/wp-content/plugins/temp/
sudo chown -R $USER ~/.composer
sudo composer install
sudo php bones