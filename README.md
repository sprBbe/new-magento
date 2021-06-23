# TechStore
- An Ecommerce Store implemented using Magento (Group Assignment from UET)
- Deployed in: https://springbbe.games/

### Integrated modules:
- Make payment using Momo, ZaloPay, VNPay
- Weather prediction
- News articles (from vnexpress)
- Exchange rate

### Initial Setup:
```
composer install
sudo systemctl stop apache2 && sudo systemctl stop elasticsearch && sudo systemctl stop mysql && sudo systemctl stop nginx
docker-compose up -d --build
docker-compose exec php bash
php bin/magento setup:install --admin-firstname=Spring --admin-lastname=Bbe --admin-email=tridung240400@gmail.com --admin-user=admin --admin-password='AbC@12345' --base-url=http://localhost:8011 --backend-frontname=admin --db-host=mysql --db-name=magento_db --db-user=magento --db-password=secret --use-rewrites=1 --language=en_US --currency=VND --timezone=Asia/Ho_Chi_Minh --use-secure-admin=1 --admin-use-security-key=1 --session-save=files --elasticsearch-host=elasticsearch
```
### Disable two factors auth:
```
bin/magento module:disable Magento_TwoFactorAuth
```
### Theme:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:Deploy -f
```
