<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="css/reset.css">
</head>

<body>
  <div class="management">
    <h1 class="management__title">管理システム</h1>
    <div class="manegement__serch">
      <form action="{{ route('search') }}" method="GET" class="upper__taskbox">
        @csrf
        <div>
          <label for="name" class="management__name">お名前</label>
          <input type="text" name="fullname" class="management__fullname--input">
          <label for="gender" class="management__gender">性別</label>
          <div class="radiobutton">
            <input type="radio" name="gender" value="0" {{ old("gender","0") == 0 ? "checked" : "" }} class="management__gender--radio" id="gender_all">
            <label for="gender_all" class="management__gender--radio-text">全て</label>
            <input type="radio" name="gender" value="1" class="management__gender--radio" id="gender_male">
            <label for="gender_male" class="management__gender--radio-text">男性</label>
            <input type="radio" name="gender" value="2" class="management__gender--radio" id="gender_female">
            <label for="gender_female" class="management__gender--radio-text">女性</label>
          </div>
        </div>
        <div>
          <label for="created_at" class="management__created_at">登録日</label>
          <input type="date" name="from" class="management__created_at--input1">
          <span>~</span>
          <input type="date" name="to" class="management__created_at--input2">
        </div>
        <div>
          <label for="email" class="management__email">メールアドレス</label>
          <input type="email" name="email" class="management__email--input">
        </div>
        <button type="submit" class="search__btn">検索</button>
        <a href="/management" class="rest" ><p class="reset">リセット</p></a>
      </form>
    </div>
    <div class="pagenate__flex">
      {{ $contacts->total() }}件中
      {{ $contacts->firstItem() }}-{{ $contacts->lastItem() }} 件
      {{$contacts->appends(request()->query())->links('vendor.pagination.custom')}}
    </div>
    <table class="management__table">
      <tr class="management__tr">
        <th class="management__th">ID</th>
        <th class="management__th">お名前</th>
        <th class="management__th">性別</th>
        <th class="management__th">メールアドレス</th>
        <th class="management__th">ご意見</th>
        <th class="management__th"></th>
      </tr>
      @foreach ($contacts as $contact)
      <tr class="management__tr">
        <td class="management__td">
          {{$contact->id}}
        </td>
        <td class="management__td">
          {{$contact->fullname}}
        </td>
        <td class="management__td">
          @if($contact->gender == 1)
            <p>男性</p>
          @endif
          @if($contact->gender == 2)
            <p>女性</p>
          @endif
        </td>
        <td class="management__td">
          {{$contact->email}}
        </td>
        <td class="management__td">
          <p class="management_opinion">{{$contact->opinion}}</p>
        </td>
        <td class="management__td">
          <form action="{{ route('delete', ['id' => $contact->id]) }}" method="POST">
            @csrf
            <button type="submit" name="delete-btn" class="delete__btn">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <script src="{{ asset('/js/mouseover.js') }}"></script>
</body>

<style>
.management__title {
  font-size: 28px;
  text-align: center;
  margin-top: 30px;
  margin-bottom: 30px;
}
.manegement__serch {
  border: 2px solid black;
  padding: 30px 0;
  margin: 0 40px 20px;
}
.management__name,
.management__created_at,
.management__email {
  margin-left: 20px;
  margin-right: 80px;
}
.management__gender {
  margin-left: 20px;
}
.radiobutton {
  display:inline-block;
	padding-left: 20px;
	font-size: 16px;
}
.management__gender--radio-text {
	padding: 10px 15px 0 50px;
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
  border: 1px solid #C0C0C0;
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
.management__email {
  margin-left: 20px;
  margin-right: 19px;
}
.management__fullname--input,
.management__created_at--input1,
.management__email--input {
  width: 30%;
  padding: 10px 0;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-right: 20px;
  border: 1px solid #C0C0C0;
  border-radius: 5px;
}
.management__created_at--input2 {
  width: 30%;
  padding: 10px 0;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 20px;
  border: 1px solid #C0C0C0;
  border-radius: 5px;
}
.search__btn {
  display: block;
  color: #FFFFFF;
  font-weight: bold;
  background-color: #000000;
  border-radius: 3px;
  cursor: pointer;
  margin: 20px auto 0;
  padding: 10px 50px;
}
.reset {
  font-size: 14px;
  color: black;
  text-align: center;
  margin-top: 10px;
}
.pagenate__flex {
  display:flex;
  justify-content: space-between;
  margin: 0 40px;
}
.management__table {
  width: 90%;
  margin: 20px auto 0;
}
.management__th {
  text-align: left;
  border-bottom: 1px solid #000000;
  padding-bottom: 10px;
  padding-left: 20px;
}
.management__td {
  padding-top: 10px;
  padding-left: 20px;
}
.delete__btn {
  display: block;
  color: #FFFFFF;
  font-weight: bold;
  background-color: #000000;
  border-radius: 3px;
  cursor: pointer;
  padding: 3px 18px;
}
</style>
</html>