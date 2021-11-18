let theme = localStorage.getItem("theme");
let theme_Mode = document.getElementById("theme_Mode");

if (theme === "dark") {
  document.body.classList.toggle("dark-theme");
  theme_Mode.src = "assets/image/sun.png";
} else {
  theme_Mode.src = "assets/image/moon.png";
}

theme_Mode.onclick = () => {
  document.body.classList.toggle("dark-theme");
  if (document.body.classList.contains("dark-theme")) {
    theme_Mode.src = "assets/image/sun.png";
    localStorage.setItem("theme", "dark");
  } else {
    theme_Mode.src = "assets/image/moon.png";
    localStorage.setItem("theme", "light");
  }
};

AOS.init({
  offset: 120,
  duration: 1500,
});