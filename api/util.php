<?php
//SQLへの接続
$dsn  = 'mysql:dbname=sgrpg;host=127.0.0.1';  // 接続先を定義
$user = 'senpai';      // MySQLのユーザーID
$pw   = 'indocurry';   // MySQLのパスワード

// ユーザーIDを受け取る
$uid = isset($_GET['uid'])?  $_GET['uid']:null;
// Validation
if( ($uid === null) || (!is_numeric($uid)) ){
    sendResponse(false, 'Invalid uid');
    exit(1);
}

/**
 * 実行結果をJSON形式で返却する
 *
 * @param boolean $status
 * @param array   $value
 * @return void
 */
function sendResponse($status, $value=[]){
    header('Content-type: application/json');
    echo json_encode([
      'status' => $status,
      'result' => $value
    ]);
}