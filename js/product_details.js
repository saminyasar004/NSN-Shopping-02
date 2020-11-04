// select all elements

const imgContainer = document.querySelector(".img-container");
const productImg = document.getElementById("product_img");

// variables

let zoomLevel = undefined;

// eventlistener

imgContainer.addEventListener("mousemove", (e) => {
  const x = e.offsetX;
  const y = e.offsetY;
  zoomLevel = 2;
  document.body.style.cursor = "zoom-in";
  productImg.style.transformOrigin = `${x}px ${y}px`;
  productImg.style.transform = `scale(${zoomLevel})`;
});

imgContainer.addEventListener("mouseleave", () => {
  zoomLevel = 1;
  document.body.style.cursor = "default";
  productImg.style.transformOrigin = `center center`;
  productImg.style.transform = `scale(${zoomLevel})`;
});

// imgContainer.addEventListener('wheel', (e) => {
//   if (e.deltaY < 0) {
//     zoomLevel += 2;
//     if (zoomLevel >= 4) {
//       zoomLevel = 4;
//     }
//   } else if (e.deltaY > 0) {
//     zoomLevel -= 2;
//     if (zoomLevel <= 2) {
//       zoomLevel = 2;
//     }
//   }
// });
