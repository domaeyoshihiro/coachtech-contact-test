<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="css/reset.css">
</head>

<body>
  <div class="contact">
    <h1 class="contact__title">お問い合わせ</h1>
    <form class="contact__form" method="POST" action="{{ route('confirm') }}" id="form" >
      <table class="contact__table">
        @csrf
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="name" class="contact__name">お名前<span class="required">※</span></label>
          </th>
          <td class="contact__td">
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" class="contact__lastname--input">
            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" class="contact__firstname--input">
            <p class="contact__lastname--text">例）山田<span class="contact__firstname--text">例）太郎</span></p>
            @if ($errors->has('lastname'))
              <p class="error">{{$errors->first('lastname')}}</p>
            @endif
            @if ($errors->has('firstname'))
              <p class="error">{{$errors->first('firstname')}}</p>
            @endif
            <div id="error_lastname" class="error"></div>
            <div id="error_firstname" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="gender" class="contact__gender">性別<span class="required">※</span></label>
          </th>
          <td class="radiobutton">
            <input type="radio" name="gender" value="1" {{ old("gender","1") == 1 ? "checked" : "" }}  class="management__gender--radio" id="gender_male">
            <label for="gender_male" class="management__gender--radio-text">男性</label>
            <input type="radio" name="gender" value="2" {{ old("gender") == 2 ? "checked" : "" }} class="management__gender--radio" id="gender_female">
            <label for="gender_female" class="management__gender--radio-text">女性</label>
            @if ($errors->has('gender'))
              <p class="error">{{$errors->first('gender')}}</p>
            @endif
            <div id="error_gender" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="email" class="contact__email">メールアドレス<span class="required">※</span></label>
          </th>
          <td class="contact__td">
            <input type="text" id="email" name="email" value="{{ old('email') }}" class="contact__email--input">
            <p class="contact__email--text">例）test@example.com</p>
            @if ($errors->has('email'))
              <p class="error">{{$errors->first('email')}}</p>
            @endif
            <div id="error_email" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="postcode" class="contact__postcode">郵便番号<span class="required">※</span></label>
          </th>
          <td class="contact__td">
            〒<input type="postcode" id="postcode" name="postcode" value="{{ old('postcode') }}" class="contact__postcode--input">
            <p class="contact__postcode--text">例）123-4567</p>
            @if ($errors->has('postcode'))
              <p class="error">{{$errors->first('postcode')}}</p>
            @endif
            <div id="error_postcode" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="address" class="contact__address">住所<span class="required">※</span></label>
          </th>
          <td class="contact__td">
            <input type="address" id="address" name="address" value="{{ old('address') }}" class="contact__address--input">
            <p class="contact__address--text">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            @if ($errors->has('address'))
              <p class="error">{{$errors->first('address')}}</p>
            @endif
            <div id="error_address" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th">
            <label for="building_name" class="contact__building-name">建物</label>
          </th>
          <td class="contact__td">
            <input type="building_name" id="building_name" name="building_name" value="{{ old('building_name') }}" class="contact__building_name--input">
            <p class="contact__building_name--text">例）千駄ヶ谷マンション101</p>
            @if ($errors->has('building_name'))
              <p class="error">{{$errors->first('building_name')}}</p>
            @endif
            <div id="error_building_name" class="error"></div>
          </td>
        </tr>
        <tr class="contact__tr">
          <th class="contact__th--last">
            <label for="opinion" class="contact__opinion">ご意見<span class="required">※</span></label>
          </th>
          <td class="contact__td">
            <textarea cols="45" rows="5" type="opinion" id="opinion" name="opinion" class="contact__opinion--textarea">{{ old('opinion') }}</textarea>
            @if ($errors->has('opinion'))
              <p class="error">{{$errors->first('opinion')}}</p>
            @endif
            <div id="error_opinion" class="error"></div>
          </td>
        </tr>
      </table>
      <button class="confirm__btn" type="submit">確認</button>
    </form>
  </div>
  <script src="{{ asset('/js/validate.js') }}"></script>
  <script src="{{ asset('/js/postcode.js') }}"></script>
</body>

<style>
.contact {
  margin-top: 20px;
}
.contact__title {
  font-size: 28px;
  text-align: center;
  margin-bottom: 30px;
}
.contact__form {
  width: 100%;
}
.contact__table {
  margin: 0 auto;
}
.contact__th {
  text-align: left;
  padding-right: 40px;
  padding-bottom: 40px;
}
.contact__td {
  width: 80%;
}
.contact__th--last {
  vertical-align: top;
  text-align: left;
  padding-right: 40px;
  padding-bottom: 40px;
}
.required {
  font-size: 14px;
  color: 	#FF0000;
  margin-left: 10px;
}
.radiobutton {
  display:inline-block;
	padding-top: 20px;
	font-size: 16px;
}
.management__gender--radio-text {
	padding: 10px 30px 0 50px;
	font-size: 16px;
	cursor:	pointer;
	position: relative;
}
.radiobutton .management__gender--radio-text:before {
	content: '';
	width: 40px;
	height: 40px;
	position: absolute;
	top: 0;
	left: 0;
	background-color: #FFFFFF;
  border: 1px solid #000000;
	border-radius: 50%;
}
.radiobutton input[type="radio"] {
	display: none;
}
.radiobutton input[type="radio"]:checked + label:after {
	content: '';
	width: 10px;
	height: 10px;
	position: absolute;
	top: 16px;
	left: 16px;
	background-color: #000000;
	border-radius: 50%;
}
.contact__email {
  width: 100%;
}
.contact__lastname--input {
  width: 45%;
  line-height: 32px;
  border: 1px solid #C0C0C0;
  border-radius: 3px;
  margin-right: 12px;
}

.contact__firstname--input {
  width: 45%;
  line-height: 32px;
  border: 1px solid #C0C0C0;
  border-radius: 3px;
}
.contact__email--input, 
.contact__address--input,
.contact__building_name--input {
  width: 94%;
  line-height: 32px;
  border: 1px solid #C0C0C0;
  border-radius: 3px;
}
.contact__postcode--input {
  width: 90%;
  line-height: 32px;
  border: 1px solid #C0C0C0;
  border-radius: 3px;
  margin-left: 10px;
}
.contact__opinion--textarea {
  width: 94%;
  border: 1px solid #C0C0C0;
  border-radius: 3px;
  resize: none;
}
.contact__firstname--text {
  font-size: 14px;
  color: #808080;
  padding-top: 10px;
  margin-left: 270px;
  margin-bottom: 10px;
}
.contact__lastname--text,
.contact__email--text,
.contact__address--text,
.contact__building_name--text {
  font-size: 14px;
  color: #808080;
  padding-top: 10px;
  padding-left: 10px;
  margin-bottom: 15px;
}
.contact__postcode--text {
  font-size: 14px;
  color: #808080;
  padding-top: 10px;
  padding-left: 40px;
  margin-bottom: 15px;
}
.error {
  font-size: 14px;
  color: #FF0000;
  margin-bottom: 10px;
}
.confirm__btn {
  display: block;
  color: #FFFFFF;
  font-weight: bold;
  background-color: #000000;
  border-radius: 3px;
  cursor: pointer;
  margin: 20px auto 0;
  padding: 10px 50px;
}
</style>
</html>
