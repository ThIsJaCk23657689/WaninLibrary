2020 拾本書堂
====================
## 主題 ： **網銀基金會產學合作案**

### Collaborator
* 鄭秉松
* 賴潔瑩
* 張竣傑

# Prerequisites
* Apache        v2.4.38
* PHP           v7.4.9 (無法使用 php v8.0 +)
* MySQL         v8.0.14
* Composer      v1.8.0
* Laravel       v7.6.2 (本專案使用，無須特別安裝)
* Node.js       v12.16.2
* NPM           v6.9.0
* Git           v2.13.2
* wkhtmltox     v0.12.5-1.msvc2015-win64 (列印條碼)

# Installation 
```bash
composer install
copy .env.example .env
php artisan key:generate
```

This is not required if u want production mode. 
```bash
npm install
```