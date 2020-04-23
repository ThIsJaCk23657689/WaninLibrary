2020 拾本書堂
====================
## 主題 ： **網銀基金會產學合作案**

### 團隊成員 ###
* 鄭秉松
* 賴潔瑩
* 張竣傑

# 環境安裝 (不要安裝低於以下版本，且建議由上往下安裝)
* Apache        v2.4.38
* PHP           v7.3.1
* MySQL         v8.0.14
* Composer      v1.8.0
* Laravel       v7.6.2 (本專案使用，無須特別安裝)
* Node.js       v12.16.2
* NPM           v6.9.0
* Git           v2.13.2
* wkhtmltox     v0.12.5-1.msvc2015-win64 (列印條碼)
### 如果您的電腦環境版本低於以上版本，但依舊可以跑此專案的話就不用特別重新安裝 ###

## **以下連結文件請勿外流** ##
安裝方法與圖文教學請閱讀 => [Laravel 5.7 實務專題範例教學](https://drive.google.com/file/d/1YKV4rfhZ71GkeBKd30Of1smunzAzfeKb/view?usp=sharing)
#### **備註：Apache、PHP與MySQL可參考第一章，Composer安裝參考第三章、Node.js與NPM可參考7-1-2 ** ####
Git安裝與使用參考 => [未完成的Git圖文教學](https://drive.google.com/open?id=1UElz1pS3KWzKw9sNfM_sXqBeKX5jsNNb)

*如果對於指令還是不太了解，也可以參考* => [你必須要懂得Git指令](https://drive.google.com/open?id=1ejiVzU-imgdCIlBG31f4KjOII2VTjeEg)


# 如何使用 
## 下載此專案到本機端 (通常只需做一次，就是第一次將檔案下載到本機端時)
1. 請先切換到伺服器資料夾，例如www
>       cd C:\AppServ\www
2. 新增資料夾，名稱為WaninLibary (您也可以不用指令來新增)
>       mkdir WaninLibary
3. 透過網址來進行下載專案到您的本機端 *(git clone <伺服器網址> <本機端檔案路徑>)*
>       git clone https://thisjack@bitbucket.org/thisjack/waninlibary.git WaninLibary
### **注意：下載好後，還不能馬上執行專案哦，要先下載、安裝與設定好相關環境才行。**
4. 切換目錄到專案根目錄
>       cd C:\AppServ\www\WaninLibary
5. 安裝相關依賴套件 (最自動讀取composer.json檔案來安裝所需套件，最終會生成vendor資料夾出來)
>       composer install
6. 複製環境檔案 (需自行輸入資料庫帳號密碼與相關設定，基於安全問題請詢問後端人員)
>       copy .env.example .env
7. 重新生產安全Key (通常到這步驟就可以瀏覽網頁了)
>       php artisan key:generate
### *網頁請瀏覽 http://localhost/WaninLibary/public/* ###
8. 最後npm也要安裝相關依賴套件 (如果要開發前端相關css、js必要安裝)
>       npm install
npm安裝完成就大功告成了！

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