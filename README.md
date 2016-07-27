##Copy script and run in command line on Linux ##

mv /var/www/html/Magento2 /var/www/html/Magento2-backup
unzip -o /home/ubuntu/Downloads/Magento-CE-2.1.0_sample_data-2016-06-23-02-32-34.zip -d /var/www/html/Magento2
mysql -uroot -proot -e 'DROP DATABASE `magento2-1`;'
mysql -uroot -proot -e 'CREATE DATABASE `magento2-1` COLLATE ''utf8_general_ci'';'
chmod -R 777 /var/www/html/Magento2
cd /var/www/html/Magento2
bin/magento setup:install --base-url=http://127.0.0.1/Magento2/ --db-host=localhost --db-name=magento2-1 --db-user=root --db-password=root --admin-firstname=Magento --admin-lastname=User --admin-email=user@example.com --backend-frontname=admin --admin-user=admin --admin-password=password1 --language=en_US --currency=THB --timezone=Asia/Bangkok --use-rewrites=1
bin/magento indexer:reindex