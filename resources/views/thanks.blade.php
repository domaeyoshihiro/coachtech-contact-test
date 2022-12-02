<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="css/reset.css">
</head>

<body>
  <div class="thanks">
    <div>
      <p class="thanks__text">ご意見いただきありがとうございました。</p>
      <button class="top__btn" onclick="location.href='/'">トップページへ</button>
    </div>
  </div>
</body>

<style>
.thanks {
  display: flex;
  width: 100vw;
  height: 100vh;
  justify-content:center;
  align-items: center;
  text-align: center;
}
.thanks__text {
  margin-bottom: 50px;
}
.top__btn {
  color: #FFFFFF;
  font-weight: bold;
  background-color: #000000;
  border-radius: 3px;
  cursor: pointer;
  padding: 10px 20px;
}
</style>
</html>