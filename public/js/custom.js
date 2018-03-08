function myFunction(x) {
    x.classList.toggle("change");
    var x = document.getElementById("sidebar");
      if (x.style.display === "block") {
          x.style.display = "none";
      } else {
          x.style.display = "block";
      }
}
