// function ckChange(ckType) {
//   var ckName = document.getElementById(ckType.getElementById);

//   for (var i = 0; i < ckName.length; i++) {
//     if (!ckType.checked) {
//       ckName[i].disabled = false;
//     } else {
//       if (!ckName[i].checked) {
//         ckName[i].disabled = true;
//       } else {
//         ckName[i].disabled = false;
//       }
//     }
//   }

// }

function ckChange(ckType) {
    // e = true;
    // if(e){fyj
    var ckId1 = document.getElementById("checkbox1");
    var ckId2 = document.getElementById("checkbox2");
    if (ckId1.checked) {
      ckId2.disabled = true;
    }else if(!ckId1.checked){
      ckId2.disabled = false;
    }
    
    if (ckId2.checked) {
      ckId1.disabled = true;
    }else if(!ckId2.checked){
      ckId1.disabled = false;
    }
  
  
  }