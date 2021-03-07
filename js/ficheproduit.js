function incrementer(element){
    let valuecount= element.parentNode.parentNode.querySelector('.number').value;
          valuecount++;
    
    let valuemax= parseInt(element.parentNode.parentNode.querySelector('#stock').innerHTML,10);
    if (valuecount<=valuemax) {
        if(valuecount == valuemax) {
            element.style.display = "none";
        }
            element.parentNode.parentNode.querySelector('.number').value = valuecount;
    }
  }
  
  function decrementer(element){
    let valuecount= element.parentNode.parentNode.querySelector('.number').value;
        valuecount--;
        if (valuecount>=1) {
            if (element.parentNode.parentNode.querySelector('#plus').style.display == "none") {
                element.parentNode.parentNode.querySelector('#plus').style.display = "inherit";
            }
          element.parentNode.parentNode.querySelector('.number').value = valuecount;
        }
  }
