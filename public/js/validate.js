const errorMessageLastname = document.getElementById("error_lastname");
const errorMessageFirstname = document.getElementById("error_firstname");
const errorMessageEmail = document.getElementById("error_email");
const errorMessagePostcode = document.getElementById("error_postcode");
const errorMessageAddress = document.getElementById("error_address");
const errorMessageBuildingname = document.getElementById("error_building_name");
const errorMessageOpinion = document.getElementById("error_opinion");
const lastname = document.getElementById("lastname");
const firstname = document.getElementById("firstname");
const email = document.getElementById("email");
const postcode = document.getElementById("postcode");
const address = document.getElementById("address");
const buildingname = document.getElementById("building_name");
const opinion = document.getElementById("opinion");
const form = document.getElementById("form");
const pattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
lastname.addEventListener("input", () => {
  let lastnameMessages = []
  if (lastname.value === '' || lastname.value == null) {
    lastnameMessages.push('苗字を入力してください')
    errorMessageLastname.innerText = lastnameMessages.join(', ')
  }
  if (lastname.value.length > 255) {
    lastnameMessages.push('苗字は255文字以内で入力してください')
    errorMessageLastname.innerText = lastnameMessages.join(', ')
  }
  errorMessageLastname.innerText = lastnameMessages;
})
firstname.addEventListener("input", () => {
  let firstnameMessages = []
  if (firstname.value === '' || firstname.value == null) {
    firstnameMessages.push('名前を入力してください')
    errorMessageFirstname.innerText = firstnameMessages.join(', ')
  }
  if (firstname.value.length > 255) {
    firstnameMessages.push('名前は255文字以内で入力してください')
    errorMessageFirstname.innerText = firstnameMessages.join(', ')
  }
  errorMessageFirstname.innerText = firstnameMessages;
})
email.addEventListener("input", () => {
  let emailMessages = []
  if (pattern.test(email.value)) {
    errorMessageEmail.innerText = emailMessages;
  } else {
    emailMessages.push('メールアドレスの形式が違います')
    errorMessageEmail.innerText = emailMessages.join(', ')
  }
  if (email.value === '' || email.value == null) {
    emailMessages.push('メールアドレスを入力してください')
    errorMessageEmail.innerText = emailMessages.join(', ')
  }
  if (email.value.length > 255) {
    emailMessages.push('メールアドレスは255文字以内で入力してください')
    errorMessageEmail.innerText = emailMessages.join(', ')
  }
  errorMessageEmail.innerText = emailMessages;
})
postcode.addEventListener("input", () => {
  let postcodeMessages = []
  if (postcode.value === '' || postcode.value == null) {
    postcodeMessages.push('郵便番号を入力してください')
    errorMessagePostcode.innerText = postcodeMessages.join(', ')
  }
  if (postcode.value.length < 8 || postcode.value.length > 8) {
    postcodeMessages.push('郵便番号が正しく入力されていません')
    errorMessagePostcode.innerText = postcodeMessages.join(', ')
  }
  errorMessagePostcode.innerText = postcodeMessages;
})
address.addEventListener("input", () => {
  let addressMessages = []
  if (address.value === '' || address.value == null) {
    addressMessages.push('住所を入力してください')
    errorMessageAddress.innerText = addressMessages.join(', ')
  }
  if (address.value.length > 255) {
    addressMessages.push('住所は255文字以内で入力してください')
    errorMessageAddress.innerText = addressMessages.join(', ')
  }
  errorMessageAddress.innerText = addressMessages;
})
buildingname.addEventListener("input", () => {
  let buildingnameMessages = []
  if (buildingname.value.length > 255) {
    buildingnameMessages.push('建物は255文字以内で入力してください')
    errorMessageBuildingname.innerText = buildingnameMessages.join(', ')
  }
  errorMessageBuildingname.innerText = buildingnameMessages;
})
opinion.addEventListener("input", () => {
  let opinionMessages = []
  if (opinion.value === '' || opinion.value == null) {
    opinionMessages.push('ご意見を入力してください')
    errorMessageOpinion.innerText = opinionMessages.join(', ')
  }
  if (opinion.value.length > 120) {
    opinionMessages.push('ご意見は120文字以内で入力してください')
    errorMessageOpinion.innerText = opinionMessages.join(', ')
  }
  errorMessageOpinion.innerText = opinionMessages;
})