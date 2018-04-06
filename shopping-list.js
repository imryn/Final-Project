  // conditions for the selects
  document.getElementById("artitems").style.display = "none";
  document.getElementById("officeitems").style.display = "none";
  document.getElementById("fooditems").style.display = "none";
  
  function SelectCategory(){
  var category = document.getElementById("itemcategory").value;
  var emptyitem = document.getElementById("empty");
  var aitem = document.getElementById("artitems");
  var oitem = document.getElementById("officeitems");
  var fitem = document.getElementById("fooditems");
  
  if(category == "Artmaterials")
      {
      aitem.style.display = "block";
      oitem.style.display = "none";
      fitem.style.display = "none";
      emptyitem.style.display = "none";
      }
  else{
      if(category == "Office"){
          aitem.style.display = "none";
          oitem.style.display = "block";
          fitem.style.display = "none";
          emptyitem.style.display = "none";
      }
      
      else{
              aitem.style.display = "none";
              oitem.style.display = "none";
              fitem.style.display = "block";
              emptyitem.style.display = "none";
      }
      }
      
      if(category == "Empty"){
      aitem.style.display = "none";
      oitem.style.display = "none";
      fitem.style.display = "none";
      emptyitem.style.display = "block";
      }
  }
  
  // end of conditions for the selects