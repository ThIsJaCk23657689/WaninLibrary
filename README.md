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

# This is not required if u want production mode. 
npm install
```

## 上傳此專案版本 (將您的本機端版本上載至Bitbucket)
1. 請先切換到專案資料夾
>       cd C:\AppServ\www\WaninLibary
2. 透過以下指令即可 *(git push -u <數據庫名稱> <分支名稱>)*
>       git push -u origin master

## 更新此專案版本 (更新您本地端專案版本，來跟Bitbucket端版本一樣)
1. 請先切換到專案資料夾
>       cd C:\AppServ\www\WaninLibary
2. 透過以下指令即可 *(git pull <數據庫名稱> <分支名稱>)*
>       git pull origin master

# 開發協定與說明
* 使用git的Commit遞交版本指令時，訊息的部分請不要輸入中文，會出現亂碼無法顯示，但輸入英文時也不要亂打，請輸入具有辨識性的訊息。
#### *例如新增一個導行列在首頁上，可以這樣寫：*
>       git commit -m "Add a Navbar on Home Page "

* 前端開發者可以善用Blade引擎，可以省事很多。
* 對CSS與JS進行撰寫時，可以使用Laravel Mix，使用方法如下(需安裝好npm)：
>       npm run watch

之後就會開啟監聽模式，而您只需要修改並存檔被監聽的檔案，程式就會自動編譯檔案並輸出成最終資源檔案。
#### *可以在 webpack.mix.js 檔案中看到被監聽的檔案以及各自對應轉成最終資源檔案的名稱與路徑*
舉例：通常只要修改並存檔 resources/js/app.js 或 resources/sass/app.scss ，
程式會自動編譯那些檔案並最終輸出 public/js/app.js 或 public/css/app.css。

當然開發時，可能不只有一個css檔案，開發者可以自行新增新的scss檔案在 resources/sass 中，
並在webpack.mix.js中進行註冊即可。

如果您修改並**存檔** resources/js 或 resources/sass 中的檔案，但網頁並沒有隨之改變或更動，請使用以下四種方法檢查：

* 確認有啟動 npm run watch 監聽步驟。
* 請先強制整理網頁，善用Ctrl + F5。每10秒按1次，總共按3次。
* 檢查該網頁使否遷入對應的資源檔案，檢查link與script標籤還有對應的路徑檔名等是否存在。
* 檢查 webpack.mix.js，有可能是沒有註冊該檔案，或是路徑輸入錯誤等等。

css.app 與 js.app 都有預設導入 bootstrap 4、 JQuery 與 Vue.js，所以開發上就不用匯入相關檔案。

### 對於 Laravel Mix 有疑問可以參考[此網站](https://learnku.com/docs/laravel/5.5/mix/1307)