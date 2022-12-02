<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="css/reset.css">
</head>

<body>
  <div class="confirm">
    <h1 class="confirm__title">内容確認</h1>
    <form class="confirm__form" method="POST" action="{{ route('create') }}">
      <table class="confirm__table">
      @csrf
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>お名前</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['lastname'] }} {{ $inputs['firstname'] }}
            <input name="lastname" value="{{ $inputs['lastname'] }}" type="hidden">
            <input name="firstname" value="{{ $inputs['firstname'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>性別</label>
          </th>
          <td class="confirm__td">
            @if ($gender == 1)
              <p>男性</p>
            @endif
            @if ($gender == 2)
              <p>女性</p>
            @endif
            <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>メールアドレス</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['email'] }}
            <input name="email" value="{{ $inputs['email'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>郵便番号</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['postcode'] }}
            <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>住所</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['address'] }}
            <input name="address" value="{{ $inputs['address'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>建物</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['building_name'] }}
            <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>ご意見</label>
          </th>
          <td class="confirm__td">
            {!! nl2br(e($inputs['opinion'])) !!}
            <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
          </td>
        </tr>
      </table>
      <button type="submit" name="action" value="submit" class="add__btn">送信</button>
      <a href=""><button type="submit" name="action" value="back" class="revise__btn">修正する</button></a>
    </form>
  </div>
</body>

<style>
.confirm__title {
  font-size: 28px;
  text-align: center;
  margin-top: 20px;
  margin-bottom: 30px;
}
.confirm__table {
  width: 60%;
  margin: 0 auto;
}
.confirm__th {
  width: 20%;
  text-align: left;
  padding-right: 100px;
  padding-bottom: 50px;
}
.confirm__td {
  width: 40%;
}
.add__btn {
  display: block;
  color: #FFFFFF;
  font-weight: bold;
  background-color: #000000;
  border-radius: 3px;
  cursor: pointer;
  margin: 20px auto 0;
  padding: 10px 50px;
}
.revise__btn {
  display: block;
  background-color: white;
  border: none;
  margin: 5px auto 0;
}
</style>
</html>