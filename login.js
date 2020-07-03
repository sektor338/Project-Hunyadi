let i = 0;
let isMobile = navigator.userAgent.toLowerCase().match(/mobile/i);

function background() {
      if (isMobile) {
            setInterval(function() {
                  i = 1;
                  let img = document.getElementById("background");
                  i += 1;
                  img.background = "pictures/pictures/mobile wallpapers/" + i + ".jpg";
                  if (i === 4) {
                        i = 0;
                  }
            }, 100000);
      } else {
            setInterval(function() {
                  let img = document.getElementById("background");
                  i++;
                  img.background = "pictures/backgrounds/" + i + ".jpg";
                  if (i === 32) {
                        i = 0;
                  }
            }, 100000);
      }


}
