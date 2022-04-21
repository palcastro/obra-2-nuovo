function easyTabs() {
  var groups = document.querySelectorAll('.t-container');
  if (groups.length > 0) {
    for (i = 0; i < groups.length; i++) {
      var tabs = groups[i].querySelectorAll('.t-tab');
      for (t = 0; t < tabs.length; t++) {
        tabs[t].setAttribute("index", t+1);
        if (t == 0) tabs[t].className = "t-tab selected";
      }
      var contents = groups[i].querySelectorAll('.t-content');
      for (c = 0; c < contents.length; c++) {
        contents[c].setAttribute("index", c+1);
        if (c == 0) contents[c].className = "t-content selected";
      }
    }
    var clicks = document.querySelectorAll('.t-tab');
    for (i = 0; i < clicks.length; i++) {
      clicks[i].onclick = function() {
        var tSiblings = this.parentElement.children;
        for (i = 0; i < tSiblings.length; i++) {
          tSiblings[i].className = "t-tab";
        }
        this.className = "t-tab selected";
        var idx = this.getAttribute("index");
        var cSiblings = this.parentElement.parentElement.querySelectorAll('.t-content');
        for (i = 0; i < cSiblings.length; i++) {
          cSiblings[i].className = "t-content";
          if (cSiblings[i].getAttribute("index") == idx) {
            cSiblings[i].className = "t-content selected";
          }
        }
      };
    }
  }
}

(function() {
  easyTabs();
})();
