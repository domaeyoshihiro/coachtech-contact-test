const managementOpinion = document.getElementsByClassName("management_opinion");
Array.prototype.forEach.call(managementOpinion, (content => {
  const str = content.textContent;
  const len = 25;
    if (str.length > len) {
      content.textContent = str.substring(0, len) + '...';
    }
    content.addEventListener("mouseover", () => {
      content.textContent = str;
    })
    content.addEventListener("mouseout", () => {
      if (str.length > len) {
        content.textContent = str.substring(0, len) + '...';
      }
    })
  })
)



