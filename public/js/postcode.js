postcode.addEventListener("input", (e) => {
  postcode.value = postcode.value.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
    return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
  }).replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');
  const api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode='
  const param = postcode.value
  const url = api + param;
  if (e.target.value.length == 8) {
    fetch(url)
      .then(response => response.json())
      .then(data => {
        address.value = data.results[0].address1 + data.results[0].address2 + data.results[0].address3;
      })
      .catch(error => console.log(error))
  }
})

