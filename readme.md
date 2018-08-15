<p align="center"><h1>Ethereum@Laravel 開發範例 - 樂透遊戲</h1></p>
<p align="center"><img src="https://cdn-images-1.medium.com/max/800/1*m_mZQsA2xauAqBNI8DQx1w.png"></p>
<br/><br/>


## 1. 安裝必備 composer 套件

- 在專案根目錄下執行:<br />
composer install<br /><br />


## 2. 編輯 .env 檔

- 在專案根目錄下執行:<br />
cp .env.example .env

- 編輯 .env<br />
vi .env

- 加入以下內容:<br />
ETH_HOST='http://localhost'<br />
ETH_PORT=7545<br /><br />
LOTTERY_CONTRACT_ADDR = 合約地址<br />
LOTTERY_OWNER_ADDR = 合約擁有者帳號地址<br />

## 4. 測試環境 MySQL 設定/匯入

- 先在測試環境的 MySQL 建一個新的資料庫「lottery」，相關設定則編輯 .env 內容的 DB_ 開頭屬性 <br />

- 接著在專案根目錄下執行:<br />
php artisan migrate<br /><br />


## 5. 以太坊私鏈架設

- Ganache 下載連結:<br />
https://truffleframework.com/ganache

- 安裝完啟動後本機就會預設有一條私鏈:<br />
http://127.0.0.1:7545<br /><br />


## 6. 安裝 Truffle 環境

- 執行以下指令:<br />
npm install -g truffle<br /><br />


## 7. 編譯智慧合約並配置上私鏈

- 在 Laravel 專案根目錄下執行:<br />
cd truffle<br />
truffle compile<br />
truffle migrate --reset<br /><br />

## 8. 測試看看

- 在 Laravel 專案根目錄下執行:<br />
php artisan serve<br />

- 玩家連結:<br />
http://127.0.0.1:8000<br />
先註冊後下注<br />

- 莊家開獎連結:<br />
http://127.0.0.1:8000/pick_winner<br /><br />


## 相關連結

- Truffle 用法<br />
https://truffleframework.com/docs<br />

- 以太坊 RPC API 文件<br />
https://github.com/ethereum/wiki/wiki/JSON-RPC

- Ethereum Package for Laravel<br />
https://github.com/jcsofts/laravel-ethereum/blob/master/README.md<br />



