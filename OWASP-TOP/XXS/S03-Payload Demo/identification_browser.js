
function identBrowser(){
  if (window.ActiveXObject) {
    if(document.documentElement && typeof document.documentElement.style.maxHeight != "undefined")
    {
      if(typeof document.adoptNode != "undefined")  // Safaris 3 && FF && opera && chorme
      {
        return "Internet Explorer 8";
      }
      return "Internet Explorer 7/8/9/10/11";
    }
    return "Internet Explorer 6 or Below";
  } else if(typeof window.opera != "undefined"){
    //opera : window.opera.varsion();
    return "Opera";
  } else if(typeof window.netscape != "undefined") {
    if(typeof window.Iterator != "undefined")
    {
        if(typeof document.styleSheetSets != "undefined"){
          //满足以上条件就是 Firefox 3 以上
          return "Mozilla Version 3";
        }
        return "Mozilla Version 2 Above";
    }
    return "Firefox Mozilla";
  } else if (typeof window.pageXOffset != "undefined") {  //Mozilla 、Safari、Googrle Chrome
    try {
      if(typeof external.AddSearchProvider != "undefined")
      {
          return "Google Chrome";
      }
    } catch (e) {
        return "Apple Safari";
    }
  } else {
    return "unknown";
  }
}
