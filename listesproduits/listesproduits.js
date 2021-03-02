function changeVisibility() {
    if (document.getElementById('stocksCheckbox').checked) {
        Array.from(document.getElementsByClassName("stock")).forEach(item => item.style.visibility = "visible");
    } else {
        Array.from(document.getElementsByClassName("stock")).forEach(item => item.style.visibility = "hidden");
    }
}

function openNav() {
    document.getElementById("mySidepanel").style.width = "150px";
  }
  
  function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
  }